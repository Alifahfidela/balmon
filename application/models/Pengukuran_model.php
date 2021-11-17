<?php

class Pengukuran_model extends CI_model
{
    public function getAllPengukuran()
    {
        $sql = "SELECT * FROM `pengukuran`";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data, $namaberkas)
    {
        $sql = "INSERT INTO `pengukuran` 
        (
            `id`,
            `no_spt`,
            `tanggal`, 
            `judul`, 
            `lokasi`, 
            `jenis`, 
            `namaberkas`
            ) VALUES 
            (
                NULL, 
                '".$data['no_spt']."', 
                '".$data['tanggal']."', 
                '".$data['judul']."', 
                '".$data['lokasi']."', 
                '".$data['jenis']."', 
                '".$namaberkas."'
            )";
        $res = $this->db->query($sql);
        return $res;
    }
    
}