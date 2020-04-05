<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Welcome",
            "req_body_class" => "sidebar-mini",
            "user_logged_info" => (object) [
                "peran" => "Praktikan",
                "nama" => $_SESSION["user_logged"][0],
                "kelas_kelompok" => $_SESSION["user_logged"][1]
            ],
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/kerjakan_soal",
                    "icon" => "fas fa-pencil-alt",
                    "label" => "Kerjakan TP"
                ]
            ]
        ];

        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $data);
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function asisten()
    {
        $data = [
            "title" => "Asisten",
            "req_body_class" => "sidebar-mini",
            "user_logged_info" => (object) [
                "peran" => "Asisten",
                "nama" => $_SESSION["user_logged"][0],
                "kode" => $_SESSION["user_logged"][1]
            ],
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/koreksi",
                    "icon" => "fas fa-check-double",
                    "label" => "Koreksi TP"
                ]
            ]
        ];

        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $data);
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function admin()
    {
        $data = [
            "title" => "Admin",
            "req_body_class" => "sidebar-mini",
            "user_logged_info" => (object) [
                "peran" => "Admin",
                "username" => $_SESSION["user_logged"]
            ],
            "sidebar_menu" => [
                (object) [
                    "link" => BASEURL . "/upload_tp",
                    "icon" => "fas fa-upload active",
                    "label" => "Upload Soal TP"
                ],
                (object) [
                    "link" => BASEURL . "/atur_deadline",
                    "icon" => "fas fa-stopwatch",
                    "label" => "Atur Deadline TP"
                ]
            ]
        ];

        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $data);
        $this->view(__FUNCTION__ . "/index", $data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }
}
