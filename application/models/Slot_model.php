<?php

class Slot_model extends CI_Model
{
    public function slots($param = array())
    {
        $movie_id = isset($param['movie_id']) ? $param['movie_id'] : null;
        if ($movie_id != null) 
        {
            $this->db->where('s_movie_id', $movie_id);
        }
        $query = $this->db->get("slots");
        return $query->result_array();
    }

    public function slot($param)
    {
        $id = isset($param['id']) ? $param['id'] : 0;
        $this->db->where('id', $id);
        $query = $this->db->get('slots');

        return $query->row_array();
    }
}
