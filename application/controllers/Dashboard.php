<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('USER') == null){
            redirect(base_url('Login'));
        }
        $this->USER = (object) $this->session->userdata('USER');
    }

    private object $USER;

    public function index()
    {

        $data = array(
            'USER' => $this->USER,
            'NOTIFY' => (object)$this->session->tempdata('NOTIFY'),
        );

        $this->session->unset_tempdata('NOTIFY');


        $this->load->view('dashboard', $data);
    }


}
