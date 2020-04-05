<?php

class Login extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Login Praktikan",
            "req_body_class" => "login-page",
            "username_placeholder" => "NIM",
            "section_id" => "login_praktikan",
            "action_link_params" => "/login",
            "username_form_name" => "nim_praktikan",
            "password_form_name" => "password_praktikan",
            "submit_button_name" => "praktikan_login_btn"
        ];

        if (isset($_POST["praktikan_login_btn"])) {
            if ($this->model("Praktikan_model")->login()) {
                header("Location: " . BASEURL . "/home");
            } else {
                header("Location: " . BASEURL);
            }
        }

        $this->view("templates/header", $data);
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function asisten()
    {
        $data = [
            "title" => "Login Asisten",
            "req_body_class" => "login-page",
            "section_id" => "login_asisten",
            "action_link_params" => "/login/asisten",
            "username_placeholder" => "Kode asisten",
            "username_form_name" => "kode_asisten",
            "password_form_name" => "password_asisten",
            "submit_button_name" => "asisten_login_btn"
            // "sidebar" => $this->view("templates/sidebar")
        ];

        if (isset($_POST["asisten_login_btn"])) {
            if ($this->model("Asisten_model")->login()) {
                header("Location: " . BASEURL . "/home/asisten");
            } else {
                header("Location: " . BASEURL . "/login/asisten");
            }
        }

        $this->view("templates/header", $data);
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function admin()
    {
        $data = [
            "title" => "Login Admin",
            "req_body_class" => "login-page",
            "username_placeholder" => "Username",
            "section_id" => "login_admin",
            "action_link_params" => "/login/admin",
            "username_form_name" => "username_admin",
            "password_form_name" => "password_admin",
            "submit_button_name" => "admin_login_btn"
            // "sidebar" => $this->view("templates/sidebar")
        ];

        if (isset($_POST["admin_login_btn"])) {
            if ($this->model("Admin_model")->login()) {
                header("Location: " . BASEURL . "/home/admin");
            } else {
                header("Location: " . BASEURL . "/login/admin");
            }
        }

        $this->view("templates/header", $data);
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }
}
