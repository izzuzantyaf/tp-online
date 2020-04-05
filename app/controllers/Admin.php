<?php

class Admin extends Controller
{
    public function index()
    {
        $this->upload_soal();
    }

    public function login()
    {
        $data = [
            "title" => "Login Admin",
            "req_body_class" => "login-page",
            "username_placeholder" => "Username",
            "section_id" => "login_admin",
            "action_link_params" => "/admin/login",
            "username_form_name" => "username_admin",
            "password_form_name" => "password_admin",
            "submit_button_name" => "admin_login_btn"
        ];

        if (isset($_POST[$data["submit_button_name"]])) {
            if ($this->model("Admin_model")->login()) {
                header("Location: " . BASEURL . "/admin");
            } else {
                header("Location: " . BASEURL . "/admin/login");
            }
        }

        $this->view("templates/header", $data);
        $this->view(__FUNCTION__ . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function logout()
    {
        $this->model("Admin_model")->logout();
        header("Location: " . BASEURL . "/admin/login");
    }

    public function ubah_password()
    {
    }

    public function upload_soal()
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
                    "link" => BASEURL . "/admin/upload_tp",
                    "icon" => "fas fa-upload",
                    "label" => "Upload Soal TP"
                ],
                (object) [
                    "link" => BASEURL . "/admin/edit_soal",
                    "icon" => "fas fa-edit",
                    "label" => "Edit Soal"
                ],
                (object) [
                    "link" => BASEURL . "/admin/atur_deadline",
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

    public function atur_deadline()
    {
    }
}
