<?php

class Observasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Observasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Laporan Observasi Monitoring';

        $data['Observasi'] = $this->Observasi_model->getAllObservasi(); //ambil data database
        $this->load->view('home', $data);
        $this->load->view('Observasi/laporand/laporand', $data);
    
    }

    public function tambah()
    {
        $data['judul'] = 'Form Upload Data';
        $this->form_validation->set_rules('no_spt', 'nomor', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');
        $this->form_validation->set_rules('upload_file', 'file', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('Observasi/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Observasi_model->tambahUploadData();
            redirect('Observasi');
        }
    }
}