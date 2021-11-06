<?php

class Observasi_model extends CI_model
{
    public function getAllObservasi()
    {
        return $query = $this->db->get('laporan_perjalanan')->result_array();
    }

    public function tambahUploadData()
    {
        $data = [
            "no_spt" => $this->input->post('no_spt', true),
            "judul" => $this->input->post('judul', true),
            "lokasi" => $this->input->post('lokasi', true),
            "jenis" => $this->input->post('jenis', true),
            "upload_file" => $this->input->post('upload_file', true)

        ];

        $this->db->insert('laporan_perjalanan', $data);
    }
}