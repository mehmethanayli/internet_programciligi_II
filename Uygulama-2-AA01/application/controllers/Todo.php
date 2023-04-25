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

        $viewData = array("todos" => $items);

        $this->load->view("todo", $viewData);
    }

    public function insert()
    {

        /* Formdan gelen veri */
        $description = $this->input->post("description");

        /* Veri tabanı için hazırlanan veri */
        $data =    array(
            "description" => $description,
            "complated_at" => 0,
            "created_at"    => date("Y-m-d H:i:s")
        );

        $this->load->model("todo_model");
        $insert = $this->todo_model->insert($data);
        if ($insert) {
            redirect(base_url());
        }
    }


    public function delete($id)
    {
        $this->load->model("todo_model");
        $delete = $this->todo_model->delete($id);
        if ($delete) {
            redirect(base_url());
        } else {
            echo "Silme Yapılamadı.";
        }
    }

    /* Ödev:
        todo alanındaki description alanının yanına bir select oluşturup acil/normal seçimini gerçekleştiriniz.
        Bu işlem için gerekli veri tabanı değişikliğini yapınız.
    
    */
}
