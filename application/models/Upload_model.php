<?php
class Upload_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function sendDb($data){
        return $this->db->insert('docs', $data);
    }
}