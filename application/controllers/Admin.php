<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
    }

    public function index()
    {
        $this->load->view('admin/admin');
    }
}
