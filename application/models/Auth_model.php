<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    public function insertData($data)
    {
        $sql = "INSERT INTO `akun`
      (
          `id`,
          `username`,
          `password`,
          `role`
          ) VALUES
          (
              NULL,
              '" . $data['username'] . "',
              '" . password_hash($data['password'], PASSWORD_DEFAULT) . "',
              '1'
          )";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getOne($data)
    {
        $sql = "SELECT * FROM `akun` WHERE `akun`.`username`='" . $data . "'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
