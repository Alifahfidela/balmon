<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Perangkat_model']);
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('PerangkatPage');
     
    }

    public function getAllPerangkat()
    {
        $data = $this->Perangkat_model->getAllPerangkat();
        echo json_encode($data);
    }

    public function insertData()
    {
        $data = $_POST;
       if (isset($_FILES['berkas']['name'])){
           $namaberkas = $_FILES['berkas']['name'];
           $res = $this->Perangkat_model->insertData($data, $namaberkas);
           if($res){
            if ($data['jenis'] == '1') {
                $config['allowed_types'] = "pdf";
                $config['upload_path'] = "./upload/Monitoring Perangkat Telekomunikasi/pdf";
            }else if ($data['jenis'] == '2') {
                $config['allowed_types'] = "xml";
                $config['upload_path'] = "./upload/Monitoring Perangkat Telekomunikasi/xml";
            }else if ($data['jenis'] == '3') {
                $config['allowed_types'] = "jpg";
                $config['upload_path'] = "./upload/Monitoring Perangkat Telekomunikasi/jpg";
            }else {
               $status = 9;
            }
    
            $filename = $_FILES['berkas']['name'];
            $config['file_name'] = $filename;
            $config['max_size'] = '2048';
            
        
            $this->load->library('upload', $config);
            if($this->upload->do_upload('berkas')){
                $status = 1;
                $msg = "berhasil";
            } else{
                $status = 4;
                $msg = $this->upload->display_errors();
            }
        }else {
            $status = 3;
            $msg = "Terjadi error di query input data";
        }
       }else {
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