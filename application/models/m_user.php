<?php

class M_user extends CI_Model
{
    public function get()
    {
        return $this->db->get('user')->result();
    }

    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function cek($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
