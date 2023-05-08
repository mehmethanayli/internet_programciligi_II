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

        $this->load->library("form_validation");

        /* Kurallar belirlenir. */
        $this->form_validation->set_rules("description", "Açıklama Alanı", "required|trim|is_unique[todos.description]");

        $this->form_validation->set_message(
            array(
                "required" => "{field} doldurulmalıdır.",
                "is_unique" => "<b>{field}</b> veri tabanında daha önceden kayıtlı.",
            )
        );

        $validation = $this->form_validation->run();

        if ($validation) {
            /* Formdan gelen veri */
            $description = $this->input->post("description");
            $priority = $this->input->post("priority");

            /* Veri tabanı için hazırlanan veri */
            $data =    array(
                "description"   => $description,
                "priority"      => $priority,
                "created_at"    => date("Y-m-d H:i:s")
            );

            $this->load->model("todo_model");
            $insert = $this->todo_model->insert($data);
            if ($insert) {
                redirect(base_url());
            }
        } else {

            $this->load->model("todo_model");

            $items = $this->todo_model->getAll();

            $viewData = new stdClass();
            $viewData->todos = $items;
            $viewData->formError = TRUE;
            $this->load->view("todo", $viewData);
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
