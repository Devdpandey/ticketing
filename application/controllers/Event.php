<?php

class Event extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct(); 

		$this->load->library(array("session","form_validation"));
        $this->load->helper(array('html','form'));
		$this->load->model('Event_model');
	}

	public function index()
	{
		$data           = [];
		$data['title']  = 'All Events Available';
		$data['events'] = $this->Event_model->events();
		$this->load->view('events/index', $data);
	}

	public function form($id = 0)
    {
        $data                           = array();
        $data['title']                  = "Event Form";
        //event data statrt here
        $data['e_event_name']           = $this->input->post('e_event_name');
        $data['e_event_description']    = $this->input->post('e_event_description');
        $data['e_event_date']           = $this->input->post('e_event_date');
        $data['e_event_time']           = $this->input->post('e_event_time');
        $data['id']                     = $id;

        if( $id > 0 )
        {
            $param                  = array();
            $param['id']            = $id;
            $event                  = $this->Event_model->event($param);
            if(empty($event))
            {
                redirect(site_url('event'));exit;
            }
            $data['e_event_name']           = $event['e_event_name'];
            $data['e_event_description']    = $event['e_event_description'];
            $data['e_event_date']           = $event['e_event_date'];
            $data['e_event_time']           = $event['e_event_time'];
            $data['id']                     = $event['id'];
        }

        $this->form_validation->set_rules('e_event_name', 'Event Name', 'required|callback_event_name['.$id.']');
        $this->form_validation->set_rules('e_event_date', 'Event Date', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('events/form',$data);
        }
        else 
        {
            $save                           = array();
            $save['id']                     = $id;
            $save['e_event_name']           = $this->input->post('e_event_name');
            $save['e_event_description']    = $this->input->post('e_event_description');
            $save['e_event_date']           = $this->input->post('e_event_date');
            $save['e_event_time']           = $this->input->post('e_event_time');
            $save['id']             		= $this->Event_model->save($save);
            $this->session->set_flashdata('success', 'Data Updated successfully !');
            redirect(site_url());
        }
    }	

    public function delete($id)
    {
        $param       = array();
        $param['id'] = $id;
        $response = $this->Event_model->delete($param);
        $status = false;
        $message = 'Could not delete event!';
        if($response>0)
        {
            $status = true;
            $message = 'Event deleted successfully';
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'status' => $status,
                    'message' => $message
            )));
    }

    public function event_name($name, $id)
    {
        $event = $this->Event_model->events(array('exclude_ids' => array($id),'name' => $name));
        if(!empty($event))
        {
            $this->form_validation->set_message('event_name', 'The '.$name.' is already taken!');   
            return false;
        }
        return true;
    }
}
