<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
    }

    public function index()
    {
        $data = ['menu' => 'dashboard'];
        $this->load->view('user/dashboard_user', $data);
    }

    public function absent()
    {
        $data = ['menu' => 'absent'];
        $data1 = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data1);
        $res = $query->row_array();

        $where = ['date' => $res['date']];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();

        $where1 = ['jam_masuk' => $res['jam_masuk']];
        $data['data1'] = $this->m_user->get_data('absensi', $where1)->result();

        $this->load->view('user/absent', $data);
    }
    public function history()
    {
        $data = ['menu' => 'history'];
        $where = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $where);
        $data['absensi'] = $query->result();
        $data1 = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data1);
        $res = $query->row_array();

        $where = ['jam_pulang' => $res['jam_pulang']];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
        $this->load->view('user/history', $data);
    }
    public function permission()
    {
        $data = ['menu' => 'permission'];
        $data1 = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data1);
        $res = $query->row_array();

        $where = ['date' => $res['date']];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();

        $where1 = ['jam_masuk' => $res['jam_masuk']];
        $data['data1'] = $this->m_user->get_data('absensi', $where1)->result();
        $this->load->view('user/permission', $data);
    }

    public function aksi_absen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $time_in = date('h:i:s a');
        $time = date('H:i:s', strtotime($time_in));

        $data1 = [
            'id_karyawan' => $this->session->userdata('id'),
            'kegiatan' => $this->input->post('kegiatan'),
            'date' => $date,
            'jam_masuk' => $time,
        ];

        $data2 = [
            'kegiatan' => $this->input->post('kegiatan'),
        ];

        $data = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data);
        $res = $query->row_array();

        if (empty($res['jam_masuk'])) {
            $this->m_user->add('absensi', $data1);
            redirect(base_url('user/absent'));
        } else {
            $this->m_user->update('absensi', $data2, array('id' => $res['id']));
            redirect(base_url('user/absent'));
        }
    }

    public function delete_absent($id)
    {
        $hapus = $this->m_user->delete('absensi', 'id', $id);
        if ($hapus) {
            $this->session->set_flashdata('sukses', 'Berhasil..');
            redirect(base_url('user/history'));
        } else {
            $this->session->set_flashdata('error', 'gagal..');
            redirect(base_url('user/history'));
        }
    }

    public function aksi_izin()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $data1 = [
            'keterangan_izin' => $this->input->post('izin'),
            'date' => $date,
        ];

        $data2 = [
            'id_karyawan' => $this->session->userdata('id'),
            'keterangan_izin' => $this->input->post('izin'),
            'date' => $date,
        ];

        $data = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data);
        $res = $query->row_array();

        if (empty($res)) {
            $this->m_user->add('absensi', $data2);
            redirect(base_url('user/permission'));
        } else {
            $this->m_user->update('absensi', $data1, array('id' => $res['id']));
            redirect(base_url('user/permission'));
        }
    }

    public function pulang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time_in = date('h:i:s a');
        $time = date('H:i:s', strtotime($time_in));


        $data1 = [
            'jam_pulang' => $time,
            'status' => 'done'
        ];

        $data = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data);
        $res = $query->row_array();
        $where = ['jam_pulang' => $res['jam_pulang']];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();

        $izin = $this->m_user->update('absensi', $data1, array('id' => $res['id']));


        if ($izin) {
            redirect(base_url('user/history'));
        } else {
            redirect(base_url('user/history'));
        }
    }
}
