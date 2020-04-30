<?php

class Admin extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data = [
            "req_body_class" => "sidebar-mini",
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

        if (isset($_SESSION["user_logged"])) {
            $this->data["user_logged_info"] = (object) [
                "peran" => ucfirst($_SESSION["user_logged"]->role),
                "username" => $_SESSION["user_logged"]->username
            ];
        }
    }

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

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
            if ($this->model("Admin_model")->login()) {
                header("Location: " . BASEURL . "/admin");
            } else {
                header("Location: " . BASEURL . "/admin/login");
            }
        }

        $this->view("templates/header", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
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
        $data = [
            "title" => "Ubah Password",
            "old_password_name" => "password_lama_admin",
            "new_password_name" => "password_baru_admin",
            "new_password_confirm_name" => "konfirmasi_password_baru_admin",
            "submit_button_name" => "admin_ubah_password_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_button_name"]])) {
            $this->model("Admin_model")->ubah_password($_POST[$data["old_password_name"]], $_POST[$data["new_password_name"]], $_POST[$data["new_password_confirm_name"]]);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function upload_soal()
    {
        $data = [
            "title" => "Upload Soal",
            "submit_btn_name" => "upload_soal_submit_btn"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_btn_name"]])) {
            $this->model("SoalTP_model")->upload($_POST, $_FILES);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function edit_soal()
    {
        $data = [
            "title" => "Edit Soal",
            "submit_btn_name" => "edit_submit_btn"
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

    public function atur_deadline()
    {
        $data = [
            "title" => "Atur Deadline TP"
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

    public function get_soal($giliran, $modul)
    {
        echo json_encode($this->model("SoalTP_model")->get_soalTP("SELECT * FROM soal_tp WHERE giliran='$giliran' AND modul='$modul'"));
    }

    public function hapus_soal($modul, $giliran)
    {
        $this->model("SoalTP_model")->delete($modul, $giliran);
        header("Location: " . BASEURL . "/admin");
    }
}
