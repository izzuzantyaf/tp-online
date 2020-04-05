<?php
class Logout extends Controller
{
    public function index()
    {
        $this->model("Praktikan_model")->logout();
        header("Location: " . BASEURL);
    }

    public function asisten()
    {
        $this->model("Asisten_model")->logout();
        header("Location: " . BASEURL . "/login/asisten");
    }

    public function admin()
    {
        $this->model("Admin_model")->logout();
        header("Location: " . BASEURL . "/admin/login");
    }
}
