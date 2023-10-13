<?php

class M_user extends CI_Model
{
    public function get()
    {
        return $this->db->get('user')->result();
    }

    public function get_data($tabel, $where)
    {
        $data = $this->db->where($where)->get($tabel);
        return $data;
    }

    public function get_by_id($tabel, $id)
    {
        $data = $this->db->where('id', $id)->get($tabel);
        return $data;
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

    public function delete($tabel, $field, $id)
    {
        $data = $this->db->delete($tabel, array($field => $id));
        return $data;
    }

    public function update($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
}
