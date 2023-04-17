<?php
/* 
Önümüzdeki hafta email alanı ekleyerek form validation işlemlerine giriş yapılacaktır.
Örnek olarak aynı email adresine sahip kullanıcıların kaydedilmesi 
backend seviyesinde engellenecektir.
*/

class Form_Process extends CI_Controller
{

    /* Bu sınıf çalıştırıldığında otomatik olarak bu metot çalışacaktır.*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Form_Process_Model");
    }


    public function index()
    {

        $users = $this->Form_Process_Model->get_all("createdAt ASC");

        $viewData = new stdClass();
        $viewData->veriler = $users;

        $this->load->view('form_process_v', $viewData);
    }

    public function save_form()
    {
        /* Yol-1   
        $userName = $this->input->post("userName");
        $userPass = $this->input->post("userPass");

        $insert = $this->Form_Process_Model->add(
            array(
                "userName" => $userName,
                "userPass" => $userPass,
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            )
        ); 
        */


        /*  Form Validasyon İşlemleri */

        /* Kütüphane yüklendi. */
        $this->load->library("form_validation");

        /* Kurallar yazıldı. */
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyadı", "required|trim");

        /* Hata mesajları yazıldı. */
        $this->form_validation->set_message(
            array(
                "required" => "<b><u>{field} </u></b> alanı doldurulmalıdır."
            )
        );

        /* Validasyon işlemi çalıştırıldı. */
        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "userName" => $this->input->post("userName"),
                "userPass" => $this->input->post("userPass"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            );

            $insert = $this->Form_Process_Model->add($data);

            if ($insert) {
                echo "Form Başarılı Bir Şekilde Kaydedildi...";
                redirect(base_url("Form_Process"));
            }

        } else {

            $users = $this->Form_Process_Model->get_all("createdAt ASC");
            $viewData = new stdClass();
            $viewData->veriler = $users;
            $viewData->formError = true;
            $this->load->view('form_process_v', $viewData);
        }
    }

    /* Modelde kullanılan isim ile aynı olmak zorunda değil.Hatırlatma maksadıyla burada bırakıldı.  */
    public function getAll()
    {
        $users = $this->Form_Process_Model->get_all("createdAt ASC");
        echo "<pre>";
        print_r($users);
        echo "</pre> <hr>";
    }

    /* Modelde kullanılan isim ile aynı olmak zorunda değil.Hatırlatma maksadıyla burada bırakıldı.  */
    public function get()
    {
        $user = $this->Form_Process_Model->get(
            array(
                "id" => 3,
                "isActive" => 0
            )
        );
        echo "<pre>";
        print_r($user);
        echo "</pre> <hr>";
    }
}
