<?php

class Gangguan_model extends CI_model
{
    public function getAllGangguan()
    {
        $sql = "SELECT * FROM `gangguan`";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data, $namaberkas)
    {
        $sql = "INSERT INTO `gangguan` 
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
        $sql = "DELETE FROM `gangguan` WHERE `gangguan`.`id` = " . $id;
        $res = $this->db->query($sql);
        return $res;
    }
}
