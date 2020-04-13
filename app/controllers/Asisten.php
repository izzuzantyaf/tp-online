<?php

class Asisten extends Controller
{
    private $data;

    function __construct()
    {
        $this->data = [
            "req_body_class" => "sidebar-mini",
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/asisten/koreksi",
                    "icon" => "fas fa-check-double",
                    "label" => "Koreksi"
                ]
            ]
        ];

        if (isset($_SESSION["user_logged"])) {
            $this->data["user_logged_info"] = (object) [
                "peran" => ucfirst($_SESSION["user_logged"]->role),
                "nama" => $_SESSION["user_logged"]->nama,
                "kode" => $_SESSION["user_logged"]->kode
            ];
        }
    }

    public function index()
    {
        $this->koreksi();
    }

    public function login()
    {
        $data = [
            "title" => "Login Asisten",
            "req_body_class" => "login-page",
            "username_placeholder" => "Kode Asisten",
            "section_id" => "login_asisten",
            "action_link_params" => "/asisten/login",
            "username_form_name" => "kode_asisten",
            "password_form_name" => "password_asisten",
            "submit_button_name" => "asisten_login_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
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
        $data = [
            "title" => "Ubah Password",
            "old_password_name" => "password_lama_asisten",
            "new_password_name" => "password_baru_asisten",
            "new_password_confirm_name" => "konfirmasi_password_baru_asisten",
            "submit_button_name" => "asisten_ubah_password_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
            $this->model("Asisten_model")->ubah_password($_POST[$data["old_password_name"]], $_POST[$data["new_password_name"]], $_POST[$data["new_password_confirm_name"]]);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function koreksi()
    {
        $data = [
            "title" => "Asisten"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
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
