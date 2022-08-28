<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $url = $this->uri->segment(2);
        if ($url !== "logout" && $this->session->userdata('USER') !== null) {
            redirect(base_url('Lessons'));
        }
    }



    public function index($error = 0)
	{
		$this->load->view('login', array('error' => $error));
	}

//    GİRİŞ İŞLEMİ
    public function Signin(){
        $user = $this->input->post('email');
        $pass = $this->input->post('pass');

        if ($user !== "" && $pass !== ""){
            $this->load->model('login_model');
            $logRes = $this->login_model->verify($user, $pass);

            if (!is_array($logRes)){
                redirect(base_url('Login/index/2'));
            }else{
                $this->session->set_userdata('USER', $logRes);
                redirect(base_url('Lessons'));
            }
        }else{
            redirect(base_url('Login/index/1'));
        }
    }


//    ÇIKIŞ İŞLEMİ
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }

}
