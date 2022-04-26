<?php

class Movie extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct(); 

		$this->load->library(array("session","form_validation"));
        $this->load->helper(array('html','form'));
		$this->load->model(['Movie_model','Slot_model','Booking_model']);
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
        if($id == null)
        {
            exit('No slots found!');
        }
		$data                 = [];
		$data['title']        = 'Available slots';
		$data['slots']        = $this->Slot_model->slots(array('movie_id' => $id));
        $data['movie_detail'] = $this->Movie_model->movie(array('id' => $id));
		$this->load->view('movies/slots', $data);
	}

    public function book($id = null)
	{
        if($id == null)
        {
            exit('No slot found!');
        }
		$data                 = [];
		$data['title']        = 'Book seats';
		$data['slot']         = $this->Slot_model->slot(array('id' => $id));
		$data['bookings']     = json_encode($this->Booking_model->bookings(array('slot_id' => $id)));
		$this->load->view('movies/booking', $data);
	}

}
