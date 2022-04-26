<?php

class Movie_model extends CI_Model
{

    public function movies($param = array())
    {
        $query = $this->db->get("movies");
        return $query->result_array();
    }

    public function movie($param)
	{
        $id = isset($param['id']) ? $param['id'] : 0;
        $this->db->where('id', $id);
        $query = $this->db->get('movies');
        return $query->row_array();
	}

   
}
