<?php

class Monitor_model extends CI_model
{
    public function getAllMonitor()
    {
        $sql = "SELECT * FROM `monitor`";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data, $namaberkas)
    {
        $sql = "INSERT INTO `monitor` 
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