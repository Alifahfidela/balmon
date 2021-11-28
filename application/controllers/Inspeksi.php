<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inspeksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Inspeksi_model']);
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('InspeksiPage');

    }

    public function getAllInspeksi()
    {
        $data = $this->Inspeksi_model->getAllInspeksi();
        echo json_encode($data);
    }

    public function insertData()
    {
        $data = $_POST;
        if (isset($_FILES['berkas']['name'])) {
            $namaberkas = $_FILES['berkas']['name'];

            if ($data['jenis'] == '1') {
                $config['allowed_types'] = "pdf";
                $config['upload_path'] = "./upload/Inspeksi Stasiun Radio/pdf";
            } else if ($data['jenis'] == '2') {
                $config['allowed_types'] = "xml";
                $config['upload_path'] = "./upload/Inspeksi Stasiun Radio/xml";
            } else if ($data['jenis'] == '3') {
                $config['allowed_types'] = "jpg|png";
                $config['upload_path'] = "./upload/Inspeksi Stasiun Radio/jpg";
            } else {
                $status = 9;
            }

            $filename = $_FILES['berkas']['name'];
            $config['file_name'] = $filename;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('berkas')) {
                $res = $this->Inspeksi_model->insertData($data, $namaberkas);
                if ($res) {
                    $status = 1;
                    $msg = "berhasil";
                } else {
                    $status = 3;
                    $msg = "Terjadi error di query input data";
                }
            } else {
                $status = 4;
                $msg = $this->upload->display_errors();
            }
        } else {
            $status = 3;
            $msg = "berkas tidak ada";
        }
        $ret = [
            'status' => $status,
            'msg' => $msg,
        ];
        echo json_encode($ret);
    }
}
