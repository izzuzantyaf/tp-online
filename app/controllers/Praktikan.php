<?php

class Praktikan extends Controller
{
    protected $data;

    function __construct()
    {
        $this->data = [
            "req_body_class" => "sidebar-mini",
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/praktikan/kerjakan_soal",
                    "icon" => "fas fa-pencil-alt",
                    "label" => "Kerjakan TP"
                ]
            ]
        ];
    }

    public function index()
    {
        $this->kerjakan_soal();
    }

    public function login()
    {
        $prepared_data = [
            "title" => "Login Praktikan",
            "req_body_class" => "login-page",
            "username_placeholder" => "NIM",
            "section_id" => "login_praktikan",
            "action_link_params" => "/praktikan/login",
            "username_form_name" => "nim_praktikan",
            "password_form_name" => "password_praktikan",
            "submit_button_name" => "praktikan_login_btn"
        ];

        foreach ($prepared_data as $key => $value) {
            $this->push($key, $value);
        }

        if (isset($_POST["praktikan_login_btn"])) {
            if ($this->model("Praktikan_model")->login()) {
                header("Location: " . BASEURL . "/praktikan");
            } else {
                header("Location: " . BASEURL);
            }
        }

        $this->view("templates/header", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function logout()
    {
        $this->model("Praktikan_model")->logout();
        header("Location: " . BASEURL);
    }

    public function ubah_password()
    {
    }

    public function kerjakan_soal()
    {
        $prepared_data = [
            "title" => "Tugas Pendahuluan Praktikum Fisika Dasar",
            "user_logged_info" => (object) [
                "peran" => "Praktikan",
                "nama" => $_SESSION["user_logged"][0],
                "kelas_kelompok" => $_SESSION["user_logged"][1]
            ]
        ];

        foreach ($prepared_data as $key => $value) {
            $this->push($key, $value);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view("home/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function lihat_nilai()
    {
    }
}
