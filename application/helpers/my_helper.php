<?php
// get name from table user
function name($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_depan . ' ' . $c->nama_belakang;
        return $stmt;
    }
}

// get jam_pulang from table absensi
function pulang($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('absensi');
    foreach ($result->result() as $c) {
        $stmt = $c->jam_pulang;
        return $stmt;
    }
}

// get keterangan_izin from table absensi
function izin($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('absensi');
    foreach ($result->result() as $c) {
        $stmt = $c->keterangan_izin;
        return $stmt;
    }
}

// get date from table absensi
function tgl($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('absensi');
    foreach ($result->result() as $c) {
        $stmt = $c->date;
        return $stmt;
    }
}
