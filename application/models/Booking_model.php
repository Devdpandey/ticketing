<?php

class Booking_model extends CI_Model
{
    public function bookings($param = array())
    {
        $slot_id = isset($param['slot_id']) ? $param['slot_id'] : null;
        if ($slot_id != null) 
        {
            $this->db->where('b_slot_id', $slot_id);
        }
        $query = $this->db->where('b_status', 'sold')->get("bookings");
        return $query->result_array();
    }

    public function check_bookings($param)
    {
        $slot_id = isset($param['slot_id']) ? $param['slot_id'] : null;
        $seat_id = isset($param['seat_id']) ? $param['seat_id'] : null;

        if ($slot_id != null) 
        {
            $this->db->where('b_slot_id', $slot_id);
        }
        if ($seat_id != null) 
        {
            $this->db->where('b_seat_id', $seat_id);
        }
        $query = $this->db->get("bookings");

        return $query->row_array();
    }

    public function save($data = array())
    {
        $this->db->insert_batch('bookings', $data);
        return $this->db->insert_id();
    }

    public function update($data = array())
    {
        $this->db->update_batch('bookings', $data, 'id');
        return $this->db->insert_id();
    }

    public function delete($data = array())
    {   
        $this->db->where_in('id', $data);
        $this->db->delete('bookings');
        return $this->db->affected_rows();
    }
}
