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

    public function total_absent($id)
    {
        return $this->db->where('keterangan_izin', '-')->where('id_karyawan', $id)->get('absensi')->num_rows();
    }

    public function total_izin($id)
    {
        return $this->db->where('jam_masuk', null)->where('status', 'done')->where('id_karyawan', $id)->get('absensi')->num_rows();
    }

    public function total_absent_today($today)
    {
        return $this->db->where('keterangan_izin', '-')->where('date', $today)->get('absensi')->num_rows();
    }

    public function total_izin_today($today)
    {
        return $this->db->where('jam_masuk', null)->where('status', 'done')->where('date', $today)->get('absensi')->num_rows();
    }

    public function total_karyawan()
    {
        return $this->db->where('role', 'karyawan')->get('user')->num_rows();
    }

    public function getAbsensiLast7Days()
    {
        $this->load->database();
        $end_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
        $query = $this->db->select('id_karyawan, date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status, COUNT(*) AS total_absences')
            ->from('absensi')
            ->where('date >=', $start_date)
            ->where('date <=', $end_date)
            ->group_by('date, kegiatan, jam_masuk, jam_pulang, keterangan_izin, status')
            ->get();
        return $query->result_array();
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

    // pp

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
}
