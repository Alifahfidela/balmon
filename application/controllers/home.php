<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $_SESSION;
        if ($user['role'] != 1) {
            redirect(base_url() . "index.php/Auth/Redirect");
        }
    }
    public function index()
    {
        $this->load->view('home');
    }
    public function dashboard()
    {
        $this->load->view('dashboard');
    }
}
