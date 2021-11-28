<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Auth_model']);
    }

    public function index()
    {
        print_r('ada');
    }
    public function Login()
    {
        $data = $_POST;
        $ret = $this->Auth_model->getOne($data['username']);
        if (sizeof($ret) != 0) {
            if (password_verify($data['password'], $ret[0]['password'])) {
                $_SESSION['id_username'] = $ret[0]['id'];
                $_SESSION['username'] = $ret[0]['username'];
                $_SESSION['role'] = $ret[0]['role'];
                $ret = "Berhasil Masuk";
            }
        } else {
            $ret = "Gagal Masuk";
        }
        echo json_encode($ret);
    }
    public function Register()
    {
        $data = $_POST;
        $ret = $this->Auth_model->getOne($data['username']);
        if (sizeof($ret) > 0) {
            $res = 4;
            $msg = "Akun sudah ada";
        } else {
            $res = $this->Auth_model->insertData($data);
            $msg = "Akun berhasil dibuat";
        }
        $ret = array('msg' => $msg, 'res' => $res);
        echo json_encode($ret);
        // $this->Auth_model
    }
    public function Redirect()
    {
        $sess = $_SESSION;
        if ($sess['role'] == '1' || $sess['role'] == 1) {
            redirect(base_url() . "index.php");
        } else {
            redirect(base_url() . "index.php/Login");
        }
        // print_r($_SESSION);
    }
    public function Logout()
    {
        session_destroy();
        echo json_encode(1);
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
