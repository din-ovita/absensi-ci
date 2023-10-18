<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	// halaman home
	public function index()
	{
		$data['title'] = 'Home Page';
		$this->load->view('component/home', $data);
	}

	// halaman login email
	public function login()
	{
		$this->load->view('component/login');
	}

	// halaman login username
	public function login_username()
	{
		$this->load->view('component/login_username');
	}

	// halaman register
	public function register()
	{
		$this->load->view('component/register');
	}

	// aksi registrasi
	public function aksi_register()
	{
		$password = md5($this->input->post("password"));
		$passwordk = $this->input->post("password");

		$data = [
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'nama_depan' => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'password' => $password,
			'role' => 'karyawan',
			'image' => 'user_picture.jpg'
		];
		$email = ['email' => $this->input->post('email')];
		$query = $this->m_user->cek('user', $email);
		$result = $query->row_array();
		var_dump($result);
		// validasi jika email sudah digunakan
		if ($result) {
			$this->session->set_flashdata('error_message', 'The account already exists');
			redirect(base_url('auth/register'));
		} elseif (strlen($passwordk) >= 8 && empty($result)) { // validasi jika password kurang dari 8 karakter
			$this->m_user->add('user', $data);
			redirect(base_url('auth/login'));
		} else {
			$this->session->set_flashdata('error_message', 'Password must be at least 8 characters');
			redirect(base_url('auth/register'));
		}
	}

	// aksi login dengan email
	public function aksi_login_email()
	{
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('confirm_password');
		$data = ['email' => $this->input->post('email')];
		if (!empty($password)) {
			if ($password === $konfirmasi_password) {
				$data['password'] = md5($password);
			} else {
				$this->session->set_flashdata('message', 'The password and confirmed password must be the same!');
				redirect(base_url('auth/login'));
			}
		}
		$query = $this->m_user->cek('user', $data);
		$res = $query->row_array();
		if ($query->num_rows() == 1) {
			$data_session = ["id" => $res['id'], "username" => $res['username'], "email" => $res['email'], "first_name" => $res['nama_depan'], "last_name" => $res['nama_belakang'], "role" => $res['role'], 'logged_in' => 'login'];
			$data_session['login'] = "login";
			$this->session->set_userdata($data_session);
			$this->session->set_userdata('login', $data_session);
			if ($res['role'] == 'admin') {
				redirect(base_url('admin'));
			} else {
				redirect(base_url('user'));
			}
		} else {
			$this->session->set_flashdata('error_message', 'Incorrect email or password');
			redirect(base_url('auth/login'));
		}
	}

	// aksi login dengan username
	public function aksi_login_username()
	{
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('confirm_password');
		$data = ['username' => $this->input->post('username')];
		if (!empty($password)) {
			if ($password === $konfirmasi_password) {
				$data['password'] = md5($password);
			} else {
				$this->session->set_flashdata('message', 'The password and confirmed password must be the same!');
				redirect(base_url('auth/login'));
			}
		}
		$query = $this->m_user->cek('user', $data);
		$res = $query->row_array();
		if ($query->num_rows() == 1) {
			$data_session = ["id" => $res['id'], "username" => $res['username'], "email" => $res['email'], "first_name" => $res['nama_depan'], "last_name" => $res['nama_belakang'], "role" => $res['role'], 'logged_in' => 'login'];
			$data_session['login'] = "login";
			$this->session->set_userdata($data_session);
			$this->session->set_userdata('login', $data_session);
			if ($res['role'] == 'admin') {
				redirect(base_url('admin'));
			} else {
				redirect(base_url('user'));
			}
		} else {
			$this->session->set_flashdata('error_message', 'Incorrect username or password');
			redirect(base_url('auth/login_username'));
		}
	}

	// logout
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}
