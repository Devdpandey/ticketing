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
        if (isset($data['id']) && $data['id'] > 0) 
        {
            $this->db->where('id', $data['id']);
            $this->db->update('bookings', $data);
            return $data['id'];
        } 
        else 
        {
            $this->db->insert('bookings', $data);
            return $this->db->insert_id();
        }
    }

    public function delete($param)
    {
        $this->db->delete('bookings', array('id' => $param['id']));
        return $this->db->affected_rows();
    }
}
