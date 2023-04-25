<?php
class Todo_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->order_by("id DESC")->get("todos")->result();
    }

    public function insert($data)
    {
        return $this->db->insert("todos", $data);
    }

    public function delete($id)
    {
        return $this->db->where("id", $id)->delete("todos");
    }
}
