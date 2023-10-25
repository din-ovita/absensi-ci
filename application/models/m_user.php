<?php

class M_user extends CI_Model
{
    // get table user
    public function get()
    {
        return $this->db->get('user')->result();
    }

    // get table absensi
    public function get_absent()
    {
        return $this->db->get('absensi')->result();
    }

    // get where table
    public function get_data($tabel, $where)
    {
        $data = $this->db->where($where)->get($tabel);
        return $data;
    }

    // get by id
    public function get_by_id($tabel, $id)
    {
        $data = $this->db->where('id', $id)->get($tabel);
        return $data;
    }

    // add data
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    // get where table
    public function cek($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    // delete data
    public function delete($tabel, $field, $id)
    {
        $data = $this->db->delete($tabel, array($field => $id));
        return $data;
    }

    // update data
    public function update($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    // total absensi karyawan
    public function total_absent($id)
    {
        return $this->db->where('keterangan_izin', '-')->where('id_karyawan', $id)->get('absensi')->num_rows();
    }

    // total izin karyawan
    public function total_izin($id)
    {
        return $this->db->where('jam_masuk', null)->where('status', 'done')->where('id_karyawan', $id)->get('absensi')->num_rows();
    }

    // total absen hari ini
    public function total_absent_today($today)
    {
        return $this->db->where('keterangan_izin', '-')->where('date', $today)->get('absensi')->num_rows();
    }

    // total izin hari ini
    public function total_izin_today($today)
    {
        return $this->db->where('jam_masuk', null)->where('status', 'done')->where('date', $today)->get('absensi')->num_rows();
    }

    // total karyawan
    public function total_karyawan()
    {
        return $this->db->where('role', 'karyawan')->get('user')->num_rows();
    }

    // get absensi by week
    public function getAbsensiByWeek($year, $week)
    {
        $this->db->from('absensi');
        $this->db->where("YEARWEEK(date, 1) = '$year$week'");
        $db = $this->db->get();
        $result = $db->result_array();
        return $result;
    }

    public function getbulanan($bulan)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%Y-%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
    }

    public function getharian($hari)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%Y-%m-%d') =", $hari);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
    }

    public function get_items($limit, $offset, $role)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->where('role', $role)->get('user');
        return $query->result();
    }

    public function count_items($role)
    {
        return $this->db->where('role', $role)->get('user')->num_rows();
    }

    public function get_item($limit, $offset, $table)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function count_item($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function get_item_where($limit, $offset, $bulan)
    {
        $this->db->limit($limit, $offset);
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%Y-%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->result();
        return $result;
    }

    public function count_item_where($bulan)
    {
        $this->db->from('absensi');
        $this->db->where("DATE_FORMAT(absensi.date, '%Y-%m') =", $bulan);
        $db = $this->db->get();
        $result = $db->num_rows();
        return $result;
    }

    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('nama_depan', $keyword);
        $this->db->or_like('nama_belakang', $keyword);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('user', $data);
        if ($insert) {
            return true;
        }
    }

}
