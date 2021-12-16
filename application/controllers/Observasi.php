<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Observasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Observasi_model']);
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('observasiPage');
    }

    public function getAllObservasi()
    {
        $data = $this->Observasi_model->getAllObservasi();
        echo json_encode($data);
    }

    public function insertData()
    {
        $data = $_POST;
        if (isset($_FILES['berkas']['name'])) {
            // File Case
            $this->load->helper('UploadHelp');

            $namaberkas = seoUrl($_FILES['berkas']['name']);

            $uploaded = file_upload('Observasi Monitoring', $data, $namaberkas);
            // End File Case
            $configs['config'] = $uploaded['config'];
            $res = $this->Observasi_model->insertData($data, $namaberkas);
            if ($res) {
                $status = 1;
                $msg = "berhasil";
            } else {
                $status = 3;
                $msg = "Terjadi error di query input data";
            }
            // 
        } else {
            $status = 3;
            $msg = "berkas tidak ada";
        }
        $ret = array(
            'status' => $status,
            'msg' => $msg,
            'configs' => $configs,
            'data'      => $data
        );
        echo json_encode($ret);
    }

    public function deleteData()
    {
        $data = $_POST;
        if ($data['jenis'] == '1') {
            $dir = './upload/Observasi Monitoring/pdf/';
        } else if ($data['jenis'] == '2') {
            $dir = "./upload/Observasi Monitoring/xml/";
        } else if ($data['jenis'] == '3') {
            $dir = "./upload/Observasi Monitoring/jpg/";
        } else {
            $status = 9;
        }
        $path = $dir . $data['namaberkas'];
        if (unlink($path)) {
            $msg = 'berhasil hapus berkas';
        } else {
            $msg = 'gagal hapus berkas';
        }
        $res = $this->Observasi_model->deleteData($data['id']);
        echo json_encode(array('msg' => $msg, 'res' => $res));
    }
}
