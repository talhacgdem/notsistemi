<?php
class Upload extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('USER') == null) {
            redirect(base_url('Login'));
        }
        $this->USER = (object)$this->session->userdata('USER');
    }

    private object $USER;

    public function index(){
        $config = array(
            'upload_path' => 'uploaded/',
            'allowed_types' => 'pdf|doc|docx|ppt|pptx|xls|xlsx|txt',
            'encrypt_name' => TRUE,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')){
            $data = array(
                'docname' => $this->upload->data('orig_name'),
                'path' => $this->upload->data('file_name'),
                'studentid' => $this->input->post('userid'),
                'date' => date('Y-m-d H:i:s'),
                'hwid' => $this->input->post('hwid')
            );

            $this->load->model('upload_model');
            if ($this->upload_model->sendDb($data)){
                echo json_encode(array('error' => false, 'msg' => 'Başarılı'), JSON_UNESCAPED_UNICODE);
                $this->notify->setNotify('Dosyanız başarıyla gönderildi','success');
            }else{
                echo json_encode(array('error' => true, 'msg' => 'Veritabanına kaydedilemedi'), JSON_UNESCAPED_UNICODE);
                $this->notify->setNotify('Veritabanına kaydedilemedi','danger');
            }
        }else{
            echo json_encode(array('error' => true, 'msg' => $this->upload->display_errors()), JSON_UNESCAPED_UNICODE);
            $this->notify->setNotify('Dosya yüklenemedi : ' . $this->upload->display_errors(),'danger');
        }
    }
}