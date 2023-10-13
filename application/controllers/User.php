<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }


    public function index()
    {
        $data = ['menu' => 'dashboard'];
        $where = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $where);
        $data['absensi'] = $query->result();
        $this->load->view('user/dashboard_user', $data);
    }

    public function absent()
    {
        $data = ['menu' => 'absent'];
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
        $this->load->view('user/absent', $data);
    }
    public function history()
    {
        $data = ['menu' => 'history'];
        $where = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $where);
        $data['absensi'] = $query->result();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
        $result = $this->m_user->get_data('absensi', $where)->row_array();

        if ($result['jam_pulang'] === null) {
            $currentTimestamp = time();

            $startOfDayTimestamp = strtotime('tomorrow');

            if ($currentTimestamp > $startOfDayTimestamp) {
                $data1 = [
                    'jam_pulang' => '00:00:00',
                    'status' => 'done'
                ];

                $this->m_user->update('absensi', $data1, array('id' => $result['id']));
            }
        }

        $this->load->view('user/history', $data);
    }
    public function permission()
    {
        $data = ['menu' => 'permission'];
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
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
            redirect(base_url('user/history'));
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
            redirect(base_url('user/history'));
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
        $data['data'] = $this->m_user->get_data('absensi', $where)->row_array();

        $izin = $this->m_user->update('absensi', $data1, array('id' => $res['id']));

        if ($izin) {
            redirect(base_url('user/history'));
        } else {
            redirect(base_url('user/history'));
        }
    }

    public function profile()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'profile'];
        $this->load->view('user/profile', $data + $p);
    }
    public function change_profile()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'change_profile'];
        $this->load->view('user/change_profile', $data + $p);
    }
    public function change_password()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'change_password'];
        $this->load->view('user/change_password', $data + $p);
    }

    public function aksi_change_profile()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $image = $this->upload_img('image');

        $data1 = ['id' => $this->input->post('id')];
        $query = $this->m_user->cek('user', $data1);
        $res = $query->row_array();

        // var_dump($res);


        if ($image[0] == false) {
            $data2 = [
                'username' => $username,
                'email' => $email,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'image' => $res['image']
            ];

            $this->m_user->update('user', $data2, array('id' => $this->input->post('id')));

            redirect(base_url('user/profile'));
        } else {
            $data2 = [
                'username' => $username,
                'email' => $email,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'image' => $image[1]
            ];

            $this->m_user->update('user', $data2, array('id' => $this->input->post('id')));

            redirect(base_url('user/profile'));
        }
    }

    public function validasi_edit()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date];
        $result = $this->m_user->get_data('absensi', $where)->row_array();

        if ($result['keterangan_izin'] != '-') {
            redirect(base_url('user/permission'));
        } else {
            redirect(base_url('user/absent'));
        }
    }
}
