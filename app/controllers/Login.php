<?php

class Login extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Login Praktikan",
            "req_body_class" => "login-page",
            "username_placeholder" => "NIM"
            // "sidebar" => $this->view("templates/sidebar")
        ];
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
            "username_placeholder" => "Kode asisten"
            // "sidebar" => $this->view("templates/sidebar")
        ];
        $this->view("templates/header", $data);
        $this->view(strtolower(get_class($this)) . "/asisten", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function admin()
    {
        $data = [
            "title" => "Login Admin",
            "req_body_class" => "login-page",
            "username_placeholder" => "Username"
            // "sidebar" => $this->view("templates/sidebar")
        ];
        $this->view("templates/header", $data);
        $this->view(strtolower(get_class($this)) . "/admin", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }
}
