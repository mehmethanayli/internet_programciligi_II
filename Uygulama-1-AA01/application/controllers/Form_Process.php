<?php

class Form_Process extends CI_Controller
{

    /*  Önümüzdeki hafta email alanını ekleyerek form validation işlemlerine giriş yapılacaktır.
    Örnek olarak aynı mail adresine sahip yeni bir kullanıcı eklenmesine izin verilmeme 
    işlemi gerçekleştirilecektir. 
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Form_Process_Model");
    }


    public function index()
    {
        $users = $this->Form_Process_Model->getAll("createdAt DESC");
        /*      echo "<pre>";
        print_r($users);
        echo "</pre>"; */

        $viewData = new stdClass();
        $viewData->kullanicilar = $users;
        $viewData->istemciler = $users;
        $this->load->view("form_process_v", $viewData);
    }

    public function save_form()
    {
        /*   Yol-1
        $username   = $this->input->post("username");
        $pass       = $this->input->post("pass");
        $insert = $this->Form_Process_Model->add(
        array(
        "user_name" => $username,
        "password"  => $pass,
        "isActive"  => 1,
        "createdAt" => date("Y-m-d H:i:s")
        )
        ); */

        /* Kütüphane Önyüklendi */
        $this->load->library("form_validation");

        /* Kurallar Yazılır */
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyisim", "required|trim");
        $this->form_validation->set_rules("username", "Kullanıcı Adı", "required|trim|valid_email|is_unique[users.user_name]"); /* is_unique kontrolü yapınız. */
        $this->form_validation->set_rules("pass", "Kullanıcı Şifresi", "required|trim");
        $this->form_validation->set_rules("passConf", "Kullanıcı Şifresi (Tekrar)", "required|trim|matches[pass]"); /* Match kontrolü yapınız. */

        /* Hata mesajları */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "<b>{field}</b> Geçerli bir email adresi değil.",
                "is_unique" => "<b>{field}</b> veri tabanında daha önceden kayıtlı.",
                "matches" => "<b>{field}</b> şifreler eşleşmiyor."

            )
        );

        $validation = $this->form_validation->run();

        if ($validation) {
            echo "Form validasyonu başarılı";


            $data = array(
                "user_name" => $this->input->post("username"),
                "password" => $this->input->post("pass"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            );

            $insert = $this->Form_Process_Model->add($data);

            if ($insert) {
                redirect(base_url("Form_Process"));
            }
        } else {
            /* echo "Validasyon işlemi başarısız."; */

            $users = $this->Form_Process_Model->getAll("createdAt DESC");

            $viewData = new stdClass();
            $viewData->kullanicilar = $users;
            $viewData->formError = true;
            $this->load->view("form_process_v", $viewData);
        }
    }

    /* Modelde kullanılan isim ile aynı olmak zorunda değil.Hatırlatma maksadıyla burada bırakıldı.  */
    public function getAll()
    {
        $users = $this->Form_Process_Model->getAll("createdAt DESC");
        echo "<pre>";
        print_r($users);
        echo "</pre>";
    }

    /* Modelde kullanılan isim ile aynı olmak zorunda değil.Hatırlatma maksadıyla burada bırakıldı.  */
    public function get()
    {
        $user = $this->Form_Process_Model->get(
            array(
                "user_name" => "mehmet",
                "password" => 123456,
                "isActive" => 0
            )
        );

        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }
}