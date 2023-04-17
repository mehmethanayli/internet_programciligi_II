<?php

class Form_Process_Model extends CI_Model
{

    public $tableName = "users";

    public function __construct()
    {
        parent::__construct();
    }

    /* Tabloya veri ekleme işlemini yapar. */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    /* Tablodaki tüm verileri istenilen sırada ekleme işlemini yapar. */
    public function get_all($order = "id DESC")
    {
        return $this->db->order_by($order)->get($this->tableName)->result();
    }

    /*Tablodaki sadece istenilen veriyi çekme işlemi yapar. */
    public function get($param=array())
    {
        return $this->db->where($param)->get($this->tableName)->row();
    }
}
