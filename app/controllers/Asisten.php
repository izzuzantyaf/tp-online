<?php

class Asisten extends Controller
{
    protected $data;

    function __construct()
    {
        $this->data = [
            "req_body_class" => "sidebar-mini",
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/asisten/koreksi",
                    "icon" => "fas fa-pencil-alt",
                    "label" => "Koreksi"
                ]
            ]
        ];
    }

    public function index()
    {
        $this->koreksi();
    }

    public function login()
    {
        $prepared_data = [
            "title" => "Login Asisten",
            "req_body_class" => "login-page",
            "username_placeholder" => "Kode Asisten",
            "section_id" => "login_asisten",
            "action_link_params" => "/asisten/login",
            "username_form_name" => "kode_asisten",
            "password_form_name" => "password_asisten",
            "submit_button_name" => "asisten_login_btn"
        ];

        foreach ($prepared_data as $key => $value) {
            $this->push($key, $value);
        }

        if (isset($_POST[$prepared_data["submit_button_name"]])) {
            if ($this->model("Asisten_model")->login()) {
                header("Location: " . BASEURL . "/asisten");
            } else {
                header("Location: " . BASEURL . "/asisten/login");
            }
        }

        $this->view("templates/header", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function logout()
    {
        $this->model("Asisten_model")->logout();
        header("Location: " . BASEURL . "/asisten/login");
    }

    public function ubah_password()
    {
    }

    public function koreksi()
    {
        $prepared_data = [
            "title" => "Asisten",
            "req_body_class" => "sidebar-mini",
            "user_logged_info" => (object) [
                "peran" => "Asisten",
                "nama" => $_SESSION["user_logged"][0],
                "kode" => $_SESSION["user_logged"][1]
            ],
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/admin/koreksi",
                    "icon" => "fas fa-check-double",
                    "label" => "Koreksi TP"
                ]
            ]
        ];

        foreach ($prepared_data as $key => $value) {
            $this->push($key, $value);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }
}
