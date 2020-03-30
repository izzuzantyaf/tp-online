<?php

class Home extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Welcome",
            "req_body_class" => "sidebar-mini"
        ];
        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar");
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function asisten()
    {
        $data = [
            "title" => "Asisten",
            "req_body_class" => "sidebar-mini"
        ];
        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar");
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function admin()
    {
        $data = [
            "title" => "Admin",
            "req_body_class" => "sidebar-mini"
        ];
        $this->view("templates/header", $data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar");
        $this->view(strtolower(get_class($this)) . "/index", $data);
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }
}
