<?php

class Movie extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array("session", "form_validation"));
		$this->load->helper(array('html', 'form'));
		$this->load->model(['Movie_model', 'Slot_model', 'Booking_model']);
	}

	public function index()
	{
		$data           = [];
		$data['title']  = 'Now showing';
		$data['movies'] = $this->Movie_model->movies();
		$this->load->view('movies/index', $data);
	}

	public function slots($id = null)
	{
		if ($id == null) 
		{
			exit('No slots found!');
		}

		$data                 = [];
		$data['title']        = 'Available slots';
		$data['slots']        = $this->Slot_model->slots(array('movie_id' => $id));
		$data['movie_detail'] = $this->Movie_model->movie(array('id' => $id));
		if(empty($data['slots']) || empty($data['movie_detail']))
		{
			$this->session->set_flashdata('error', 'Movie or shows not found !');
			redirect(site_url('movie'));
		}
		$this->load->view('movies/slots', $data);
	}

	public function book($movie_id = null, $id = null)
	{
		if ($id == null || $movie_id == null) 
		{
			$this->session->set_flashdata('error', 'Shows not found !');
			redirect(site_url('movie'));
		}

		$data                 = [];
		$data['title']        = 'Book seats';
		$data['id']        	  = $id;
		$data['movie_id']     = $movie_id;
		$data['slot']         = $this->Slot_model->slot(array('id' => $id));

		if (empty($data['slot'])) 
		{
			$this->session->set_flashdata('error', 'Shows not found !');
			redirect(site_url('movie'));
		}

		$data['bookings']     = json_encode($this->Booking_model->bookings(array('slot_id' => $id)));
		$this->load->view('movies/booking', $data);
	}

	public function payment()
	{
		if (empty($this->input->post())) 
		{
			redirect(site_url('movie'));
		}

		$data                 = [];
		$data['seats']   	  = explode(',', $this->input->post('seats'));
		$movie_detail   	  = $this->Movie_model->movie(array('id' => $this->input->post('movie_id')));
		$slot_detail   	 	  = $this->Slot_model->slot(array('id' => $this->input->post('slot_id')));
		$booking_ids 		  = array();
		$create_booking 	  = array();

		foreach ($data['seats'] as $key => $seat) 
		{
			
			$create_booking[$key]['b_slot_id']  	= $this->input->post('slot_id');
			$create_booking[$key]['b_movie_id'] 	= $this->input->post('movie_id');
			$create_booking[$key]['b_movie_title']  = $movie_detail['m_title'];
			$create_booking[$key]['b_slot_title'] 	= $slot_detail['s_title'];
			$create_booking[$key]['b_slot_date'] 	= $slot_detail['s_date'];
			$create_booking[$key]['b_slot_time'] 	= $slot_detail['s_time'];
			$create_booking[$key]['b_seat_id'] 		= $seat;
			$create_booking[$key]['b_booked_date']  = date('Y-m-d h:i:s');
			$create_booking[$key]['b_paid_amount']  = $slot_detail['s_seat_price'];
			$create_booking[$key]['b_status'] 		= 'in_progress';
			$create_booking[$key]['b_created_at']   = date('Y-m-d h:i:s');
			$create_booking[$key]['b_slot_seat_id'] = $this->input->post('slot_id') . '_' . $seat;
			
		}
		$booking_id = $this->Booking_model->save($create_booking);
		$first_id = $booking_id;
		$last_id = $first_id + (count($create_booking)-1);
		for($i = $first_id; $i <= $last_id; $i++)
		{
			array_push($booking_ids, $i);
		}
		
		$data['booking_ids']  = $booking_ids;
		$data['title']        = 'Book seats';
		$data['slot']         = $this->Slot_model->slot(array('id' => $this->input->post('slot_id')));

		$this->load->view('movies/payment', $data);
	}

	public function check_bookings()
	{
		$seat_ids = $this->input->post('seat');
		$slot_id = $this->input->post('slot_id');
		$status  = true;
		$message  = 'Booking currently not available for ';

		foreach ($seat_ids as $id) 
		{
			$booking_result = $this->Booking_model->check_bookings(array('seat_id' => $id, 'slot_id' => $slot_id));
			if (count($booking_result) > 0) 
			{
				//check if it is expired and delete if expired
				$booked_date = strtotime($booking_result['b_booked_date']);
				$now = strtotime(date('y-m-d h:i:s'));
				$interval = $now - $booked_date;

				if ($interval > 60 && $booking_result['b_status'] == 'in_progress') 
				{
					$response = $this->Booking_model->delete(array('id' => $booking_result['id']));
				} 
				else 
				{
					$status = false;
					$message .= $id . ' ';
				}
			}
		}
		$message .= '. please try again later !';

		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(array(
				'status' => $status,
				'message' => $message
			)));
	}

	public function complete_bookings()
	{
		$status = $this->input->post('status');
		$booking_ids = $this->input->post('booking_id');

		if ($status == 'complete') 
		{
			$update_data = array();
			foreach ($booking_ids as $key => $id) 
			{
				$update_data[$key]['id'] = $id;
				$update_data[$key]['b_status'] = 'sold';
			}
			$this->Booking_model->update($update_data);
			$this->session->set_flashdata('success', 'Booking completed successfully !');
		} 
		else 
		{
			$delete_ids   = array();
			foreach ($booking_ids as $id) 
			{
				array_push($delete_ids, $id);	
			}
			$response = $this->Booking_model->delete($delete_ids);
			$this->session->set_flashdata('error', 'Booking cancelled successfully !');
		}

		redirect(site_url('movie'));
	}
}
