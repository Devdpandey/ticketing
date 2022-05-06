<?php

class Event_model extends CI_Model
{
    public function events($param = array())
    {
        $exclude_ids = isset($param['exclude_ids']) ? $param['exclude_ids'] : array();
        $id = isset($param['id']) ? $param['id'] : null;
        $name = isset($param['name']) ? $param['name'] : null;

        if ($id != null) 
        {
            $this->db->where('id', $id);
        }
        if (!empty($exclude_ids)) 
        {
            $this->db->where_not_in('id', $exclude_ids);
        }
        if (!empty($name)) 
        {
            $this->db->where('e_event_name', $name);
        }
        $query = $this->db->get("events");
        return $query->result_array();
    }

    public function event($param)
    {
        $id = isset($param['id']) ? $param['id'] : 0;
        $this->db->where('id', $id);
        $query = $this->db->get('events');
        
        return $query->row_array();
    }

    public function save($data = array())
    {
        if (isset($data['id']) && $data['id'] > 0) 
        {
            $this->db->where('id', $data['id']);
            $this->db->update('events', $data);
            return $data['id'];
        } 
        else 
        {
            $this->db->insert('events', $data);
            return $this->db->insert_id();
        }
    }

    public function delete($param)
    {
        $this->db->delete('events', array('id' => $param['id']));
        return $this->db->affected_rows();
    }
}
