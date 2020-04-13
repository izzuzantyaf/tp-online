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
                ],
                (object) [
                    "link" => BASEURL . "/praktikan/lihat_nilai",
                    "icon" => "fas fa-medal",
                    "label" => "Nilai TP"
                ]
            ]
        ];

        if (isset($_SESSION["user_logged"])) {
            $this->data["user_logged_info"] = (object) [
                "peran" => ucfirst($_SESSION["user_logged"]->role),
                "nama" => $_SESSION["user_logged"]->nama,
                "kelas_kelompok" => $_SESSION["user_logged"]->kelas . " " . $_SESSION["user_logged"]->kelompok
            ];
        }
    }

    public function index()
    {
        $this->kerjakan_soal();
    }

    public function login()
    {
        $data = [
            "title" => "Login Praktikan",
            "req_body_class" => "login-page",
            "username_placeholder" => "NIM",
            "section_id" => "login_praktikan",
            "action_link_params" => "/praktikan/login",
            "username_form_name" => "nim_praktikan",
            "password_form_name" => "password_praktikan",
            "submit_button_name" => "praktikan_login_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
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
        $data = [
            "title" => "Ubah Password",
            "old_password_name" => "password_lama_praktikan",
            "new_password_name" => "password_baru_praktikan",
            "new_password_confirm_name" => "konfirmasi_password_baru_praktikan",
            "submit_button_name" => "praktikan_ubah_password_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
            $this->model("Praktikan_model")->ubah_password($_POST[$data["old_password_name"]], $_POST[$data["new_password_name"]], $_POST[$data["new_password_confirm_name"]]);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function kerjakan_soal()
    {
        $data = [
            "title" => "Tugas Pendahuluan Praktikum Fisika Dasar"
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

    public function lihat_nilai()
    {
        $data = [
            "title" => "Nilai TP"
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
