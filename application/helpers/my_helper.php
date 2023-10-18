<?php
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
