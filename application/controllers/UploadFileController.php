<?php

class UploadFileController extends BC_Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function UploadFile()
    {
        $path  = date('Y',time()) . '/' . date('m',time()) . '/';
        $full  = rtrim(base_url(),'/') . '/uploads/' . $path;

        if( ! is_dir(BASE_UPLOAD_PATH . $path)) mkdir(BASE_UPLOAD_PATH . $path , 0755 , true);

        $config['upload_path']   = BASE_UPLOAD_PATH . $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['allowed_types'] = '*';
        $config['file_name']     = date('YmdHis',time()) . rand(1000,9999);

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            echo json_encode(array('error' => $this->upload->display_errors()));
            exit();
        }
        else
        {
            $filedata = $this->upload->data();
            echo json_encode(array('error'=>'','url' => $full . $filedata['file_name'],'filename' => $filedata['file_name']));
            exit();
        }
    }

}