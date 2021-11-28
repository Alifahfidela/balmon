<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $_SESSION;
        if (isset($user['role'])) {
            redirect(base_url() . "index.php/Auth/Redirect");
        }
    }

    public function index()
    {
        $this->load->view('loginPage');

    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
