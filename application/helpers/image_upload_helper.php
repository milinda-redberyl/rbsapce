<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image_upload_helper
 *
 * @author madura
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Image_upload_helper {

    static function upload_image($filename, $path, $tmp_name) {
        $CI = & get_instance();

        if ($filename) {
            $CI->load->library('upload');
            $config = array();
            $config['upload_path'] = $path;
            $config['max_size'] = '8240000';
            $config['overwrite'] = FALSE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';

            $config['file_name'] = $filename;
            $path_img = $path . $filename;
            //$tmp_name = $_FILES['fileToUpload']['tmp_name'];
            move_uploaded_file($tmp_name, $path_img);

            //$actualWebPath = base_url() . $path . $filename;
            $actualWebPath = $path . $filename;
            return $actualWebPath;
        } else {
            return NULL;
        }
    }

}
