<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->library('upload');
        $this->load->helper('url');
        // validasi login
        if ($this->session->userdata('logged_in') != 'login') {
            redirect(base_url() . 'auth');
        }
    }

    // function upload gambar
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

    // halaman dashboard user
    public function index()
    {
        $data = ['menu' => 'dashboard'];
        $where = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $where);
        $data['absensi'] = $query->result();

        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();

        $data['total_absen'] = $this->m_user->total_absent($this->session->userdata('id'));
        $data['total_izin'] = $this->m_user->total_izin($this->session->userdata('id'));

        $this->load->view('user/dashboard_user', $data);
    }

    // halaman absen
    public function absent()
    {
        $data = ['menu' => 'absent'];
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();

        $where = ['date' => $date, 'id_karyawan' => $this->session->userdata('id')];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
        $this->load->view('user/absent', $data);
    }

    // halaman history absen
    public function history()
    {
        $data = ['menu' => 'history'];
        $where = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $where);
        $data['absensi'] = $query->result();

        $data2 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data2);
        $data['user'] = $query->result();


        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date, 'id_karyawan' => $this->session->userdata('id')];
        $result = $this->m_user->get_data('absensi', $where)->row_array();

        if ($result['jam_pulang'] == null) {
            $currentTimestamp = time();
            $startOfDayTimestamp = strtotime('today 23:59:58');

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

    // halaman izin
    public function permission()
    {
        $data = ['menu' => 'permission'];
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();

        $where = ['date' => $date, 'id_karyawan' => $this->session->userdata('id')];
        $data['data'] = $this->m_user->get_data('absensi', $where)->result();
        $this->load->view('user/permission', $data);
    }

    // aksi absen
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

        $data = ['id_karyawan' => $this->session->userdata('id'), 'date' => $date];
        $query = $this->m_user->cek('absensi', $data);
        $res = $query->row_array();

        if (empty($res)) { // validasi hari ini belum absen
            $this->m_user->add('absensi', $data1);
            $this->session->set_flashdata('succes', 'You have absent today');
            redirect(base_url('user/history'));
        } else { // jika hari ini sudah absen, maka action menjadi edit
            $this->m_user->update('absensi', $data2, array('id' => $res['id']));
            $this->session->set_flashdata('success', 'Your daily activities have been updated');
            redirect(base_url('user/history'));
        }
    }

    // aksi hapus absensi
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

    // aksi izin
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
            'status' => 'done'
        ];

        $data = ['id_karyawan' => $this->session->userdata('id')];
        $query = $this->m_user->cek('absensi', $data);
        $res = $query->row_array();

        if (empty($res)) { // validasi jika hari ini belum absen
            $this->m_user->add('absensi', $data2);
            $this->session->set_flashdata('success', 'You have permission today');
            redirect(base_url('user/history'));
        } else { // jika hari ini ijin, maka menjadi update keterangan izin
            $this->m_user->update('absensi', $data1, array('id' => $res['id']));
            $this->session->set_flashdata('success', 'Your permission have been updated');
            redirect(base_url('user/history'));
        }
    }

    // aksi pulang
    public function pulang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time_in = date('h:i:s a');
        $time = date('H:i:s', strtotime($time_in));
        $date = date('Y-m-d');

        $data1 = [
            'jam_pulang' => $time,
            'status' => 'done'
        ];

        $data = ['id_karyawan' => $this->session->userdata('id'), 'date' => $date];
        $res = $this->m_user->cek('absensi', $data)->row_array();

        $izin = $this->m_user->update('absensi', $data1, array('id' => $res['id']));

        if ($izin) {
            redirect(base_url('user/history'));
        } else {
            redirect(base_url('user/history'));
        }
    }

    // halaman profile
    public function profile()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'profile'];
        $this->load->view('user/profile', $data + $p);
    }

    // halaman ubah profile
    public function change_profile()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'change_profile'];
        $this->load->view('user/change_profile', $data + $p);
    }

    // halaman ubah password
    public function change_password()
    {
        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $data['user'] = $query->result();
        $p = ['menu' => 'change_password'];
        $this->load->view('user/change_password', $data + $p);
    }

    // aksi ubah profile
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

        if ($image[0] == false) {
            $data2 = [
                'username' => $username,
                'email' => $email,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'image' => $res['image']
            ];

            $this->m_user->update('user', $data2, array('id' => $this->input->post('id')));
            $this->session->set_flashdata('succes', 'Your profile has been updated');
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
            $this->session->set_flashdata('succes', 'Your profile has been updated');
            redirect(base_url('user/profile'));
        }
    }

    // aksi ubah password
    public function aksi_change_password()
    {
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        $old_password = $this->input->post('old_password');

        $data1 = ['id' => $this->session->userdata('id')];
        $query = $this->m_user->cek('user', $data1);
        $user = $query->row_array();

        // echo md5($old_password);
        // echo $user['password'];

        if (!empty($new_password)) {
            if (md5($old_password) === $user['password']) {
                if ($new_password === $confirm_password) {
                    $data['password'] = md5($new_password);
                } else {
                    $this->session->set_flashdata('message', 'The new password and confirmed password must be the same!');
                    redirect(base_url('user/change_password'));
                }
            } else {
                $this->session->set_flashdata('message', 'The old password is wrong!');
                redirect(base_url('user/change_password'));
            }
        }

        $result = $this->m_user->update('user', $data, array('id' => $this->input->post('id')));

        if ($result) {
            $this->session->set_flashdata('success', 'Your password has been updated');
            redirect(base_url('user/profile'));
        } else {
            redirect(base_url('user/profile'));
        }
    }

    // validasi edit
    public function validasi_edit()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $where = ['date' => $date, 'id_karyawan' => $this->session->userdata('id')];
        $result = $this->m_user->get_data('absensi', $where)->row_array();

        if ($result['keterangan_izin'] != '-') { // jika hari ini izin, maka menuju page permission, untuk update ket izin
            redirect(base_url('user/permission'));
        } else { // jika hari ini absen, maka menuju page absen, untuk update kegiatan harian
            redirect(base_url('user/absent'));
        }
    }
}
