<?php

class Perairan_model extends CI_model
{
    public function getAllPerairan()
    {
        $sql = "SELECT * FROM `perairan`";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data, $namaberkas)
    {
        $sql = "INSERT INTO `perairan` 
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
                '" . $data['no_spt'] . "', 
                '" . $data['tanggal'] . "', 
                '" . $data['judul'] . "', 
                '" . $data['lokasi'] . "', 
                '" . $data['jenis'] . "', 
                '" . $namaberkas . "'
            )";
        $res = $this->db->query($sql);
        return $res;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM `perairan` WHERE `perairan`.`id` = " . $id;
        $res = $this->db->query($sql);
        return $res;
    }
}
