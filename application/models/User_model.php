<?php
class User_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(){
        return $this->db->get('uye')->result_array();
    }

    public function getMe($id){
        return $this->db->get_where('uye', array('id' => $id))->result_array()[0];
    }

    public function adduser($username, $password, $type, $name, $mail){
        return $this->db->insert('uye', array(
           'type' => $type,
           'username' => $username,
           'password' => $password,
            'name' => $name,
            'mail' => $mail
        ));
    }

    public function delete($id){
        return $this->db->delete('uye', "id=$id");
    }

    public function updateMe($id, $data){
        return $this->db->where('id', $id)->update('uye', $data);
    }

}