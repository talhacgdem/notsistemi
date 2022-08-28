<?php
class Login_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function verify($user, $pass){
        $db = $this->db->get_where('uye', array('username' => $user, 'password' => $pass));
        if ($db->result_id->num_rows > 0){
            return $db->result_array()[0];
        }else{
            return false;
        }
    }
}