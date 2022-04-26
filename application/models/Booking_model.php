<?php

class Booking_model extends CI_Model
{

    public function bookings($param = array())
    {
        $slot_id = isset($param['slot_id']) ? $param['slot_id'] : null;
        if($slot_id != null)
        {
            $this->db->where('b_slot_id', $slot_id);
        }
        $query = $this->db->get("bookings");
        return $query->result_array();
    }

   
}
