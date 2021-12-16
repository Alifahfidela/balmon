<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
    function file_upload($jenis_laporan, $data, $filename)
    {
        if ($data['jenis'] == '1') {
            $config['allowed_types'] = "pdf";
            $config['upload_path'] = "./upload/" . $jenis_laporan . "/pdf";
        } else if ($data['jenis'] == '2') {
            $config['allowed_types'] = "xml|csv";
            $config['upload_path'] = "./upload/" . $jenis_laporan . "/xml";
        } else if ($data['jenis'] == '3') {
            $config['allowed_types'] = "jpg|jpeg";
            $config['upload_path'] = "./upload/" . $jenis_laporan . "/jpg";
        } else {
            $status = 9;
        }
        // End File Case
        $config['file_name'] = $filename;
        $config['max_size'] = '2048';

        // check if folder exist
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }
        $CI = &get_instance();

        $CI->load->library('upload', $config);
        if ($CI->upload->do_upload('berkas')) {
            $status = 1;
            $msg = '';
        } else {
            $status = 4;
            $msg = $CI->upload->display_errors();
        }
        $ret = array(
            'status' => $status,
            'msg' => $msg,
            'config' => $config,
        );
        return $ret;
    }
    function seoUrl($string)
    {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        // $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}
