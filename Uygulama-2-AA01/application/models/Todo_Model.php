<?php
class Todo_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        return $this->db->get("todos")->result();
    }



}
