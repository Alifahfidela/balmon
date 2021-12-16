<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Monitor_model']);
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('MonitorPage');
    }

    public function getAllMonitor()
    {
        $data = $this->Monitor_model->getAllMonitor();
        echo json_encode($data);
    }

    public function insertData()
    {
        $data = $_POST;
        if (isset($_FILES['berkas']['name'])) {
            // File Case
            $this->load->helper('UploadHelp');

            $namaberkas = seoUrl($_FILES['berkas']['name']);

            $uploaded = file_upload('Monitor Rutin', $data, $namaberkas);
            // End File Case
            $configs['config'] = $uploaded['config'];
            $res = $this->Monitor_model->insertData($data, $namaberkas);
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
        $ret = [
            'status' => $status,
            'msg' => $msg,
        ];
        echo json_encode($ret);
    }
    public function deleteData()
    {
        $data = $_POST;
        if ($data['jenis'] == '1') {
            $dir = './upload/Monitor Rutin/pdf/';
        } else if ($data['jenis'] == '2') {
            $dir = "./upload/Monitor Rutin/xml/";
        } else if ($data['jenis'] == '3') {
            $dir = "./upload/Monitor Rutin/jpg/";
        } else {
            $status = 9;
        }
        $path = $dir . $data['namaberkas'];
        if (unlink($path)) {
            $msg = 'berhasil hapus berkas';
        } else {
            $msg = 'gagal hapus berkas';
        }
        $res = $this->Monitor_model->deleteData($data['id']);
        echo json_encode(array('msg' => $msg, 'res' => $res));
    }
}
