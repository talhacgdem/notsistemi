<?php
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

/*
 * SESSION KONTROLÜ. Açılmış bir oturum yok ise login sayfasına yönlendirir
 */
        if ($this->session->userdata('USER') == null){
            redirect(base_url('Login'));
        }
        $this->USER = (object) $this->session->userdata('USER');
        $this->load->model('user_model');
    }

    private object $USER;

    public function index()
    {

        $data = array(
            'USER' => (object) $this->USER,
            'INFOS' => match ($this->USER->type) {
                "0" => $this->user_model->getAllUsers(),
                default => $this->user_model->getMe($this->USER->id),
            }

        );


        $this->load->view('profile', $data);
    }

    public function adduser(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $mail = $this->input->post('mail');
        $type = $this->input->post('type');
        if ($this->user_model->adduser($username, $password, $type, $name, $mail)){
            $this->notify->setNotify('Kullanıcı Kaydı Başarılı', 'success');
            redirect(base_url('User'));
        }else{
            $this->notify->setNotify('Kullanıcı kaydı başarısız', 'danger');
            redirect(base_url('User'));
        }
    }

    public function delete($id){
        if ($this->USER->type == "0"){
            if ($this->user_model->delete($id)){
                $this->notify->setNotify('Kullanıcı silindi', 'success');
            }else{
                $this->notify->setNotify('Kullanıcı Silinemedi', 'danger');
            }
            redirect(base_url('User'));
        }else{
            $this->notify->setNotify('Yetkisiz işlem', 'danger');
            redirect(base_url('User'));
        }
    }

    public function updateMe(){
        if (
            $this->input->post('name') == "" ||
            $this->input->post('mail') == "" ||
            $this->input->post('password') == ""
        ){
            $this->notify->setNotify('Lütfen Boş Alan Bırakmayın', 'danger');
            redirect(base_url('User'));
        }else{
            $data = array(
                'name'      => $this->input->post('name'),
                'mail'      => $this->input->post('mail'),
                'password'  => $this->input->post('password'),
            );
            if ($this->user_model->updateMe($this->USER->id, $data)){
                $this->notify->setNotify('Bilgileriniz güncellendi', 'success');
            }else{
                $this->notify->setNotify('Güncelleme başarısız', 'danger');
            }
            redirect(base_url('User'));
        }
    }
}