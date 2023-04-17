<?php
class Todo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->model("todo_model");
        $items = $this->todo_model->getAll();
     
        $viewData=array(
            "todos" => $items
        );

        $this->load->view("todo" , $viewData);
        

    }
}
