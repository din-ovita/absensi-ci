<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data['title'] = 'Home Page';
		$this->load->view('home', $data);
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function login_username()
	{
		$this->load->view('login_username');
	}
	public function register()
	{
		$this->load->view('register');
	}
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
		if (strlen($passwordk) >= 8 && empty($result)) {
			$this->m_user->add('user', $data);
			redirect(base_url('auth/login'));
		} else {
			redirect(base_url('auth/register'));
		}
	}

	public function aksi_login_email()
	{
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('confirm_password');
		$data = ['email' => $this->input->post('email')];
		if (!empty($password)) {
			if ($password === $konfirmasi_password) {
				$data['password'] = md5($password);
			} else {
				redirect(base_url('auth/login'));
			}
		}
		$query = $this->m_user->cek('user', $data);
		$res = $query->row_array();
		if ($query->num_rows() == 1) {
			$data_session = ["id" => $res['id'], "username" => $res['username'], "email" => $res['email'], "first_name" => $res['nama_depan'], "last_name" => $res['nama_belakang'], "role" => $res['role'],];
			$data_session['login'] = "login";
			$this->session->set_userdata($data_session);
			$this->session->set_userdata('login', $data_session);
			if ($res['role'] == 'admin') {
				redirect(base_url('admin'));
			} else {
				redirect(base_url('user'));
			}
		} else {
			redirect(base_url('auth/login'));
		}
	}
	public function aksi_login_username()
	{
		$password = $this->input->post('password');
		$konfirmasi_password = $this->input->post('confirm_password');
		$data = ['username' => $this->input->post('username')];
		if (!empty($password)) {
			if ($password === $konfirmasi_password) {
				$data['password'] = md5($password);
			} else {
				redirect(base_url('auth/login'));
			}
		}
		$query = $this->m_user->cek('user', $data);
		$res = $query->row_array();
		if ($query->num_rows() == 1) {
			$data_session = ["id" => $res['id'], "username" => $res['username'], "email" => $res['email'], "first_name" => $res['nama_depan'], "last_name" => $res['nama_belakang'], "role" => $res['role'],];
			$data_session['login'] = "login";
			$this->session->set_userdata($data_session);
			$this->session->set_userdata('login', $data_session);
			redirect(base_url('user'));
		} else {
			redirect(base_url('auth/login'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}
