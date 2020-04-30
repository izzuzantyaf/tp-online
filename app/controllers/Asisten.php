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
            "title" => "Asisten",
            "submit_nilai_btn_name" => "submit_nilai"
        ];

        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        if (isset($_POST[$data["submit_nilai_btn_name"]])) {
            $nilai = [
                intval($_POST["nilai1"]),
                intval($_POST["nilai2"]),
                intval($_POST["nilai3"]),
                intval($_POST["nilai4"]),
                intval($_POST["nilai5"]),
            ];
            $jml_nilai = 0;
            foreach ($nilai as $key => $value) {
                $jml_nilai += $value;
            }
            $this->model("TP_model")->submit_nilai($_POST['giliran'], $jml_nilai, $this->data["user_logged_info"]->kode, $_POST['nim'], $_POST["modul"]);
        }

        $this->view("templates/header", $this->data);
        $this->view("templates/navbar");
        $this->view("templates/sidebar", $this->data);
        $this->view(__FUNCTION__ . "/index", $this->data);
        $this->view("templates/footer");
        $this->view("templates/js");
        $this->view("templates/close_tag");
    }

    public function get_jawaban($giliran, $kelas, $kelompok, $modul, $nim)
    {
        $ATURAN_SET = [
            "A" => [2, 6, 9, 10, 12],
            "B" => [1, 3, 7, 11, 13],
            "C" => [4, 5, 8, 10, 12],
            "D" => [0, 6, 7, 11, 13]
        ];
        // get jawaban praktikan
        $query = "SELECT ";
        $list_jawaban = $this->model("TP_model")->get_TP("SELECT * FROM tugas_pendahuluan$giliran WHERE nim='$nim' AND kelas='$kelas' AND kelompok='$kelompok' AND modul='$modul'");
        // get kunci jawaban
        $set = $list_jawaban->set_soal;
        $query = "SELECT ";
        foreach ($ATURAN_SET[$set] as $key => $value) {
            $query .= "kunci" . ($value + 1) . ",";
            $query .= "jenis_kunci" . ($value + 1) . ",";
        }
        $query = rtrim($query, ",");
        $query .= " FROM soal_tp WHERE giliran='$giliran' AND modul='$modul'";
        // echo json_encode($list_jawaban);
        // echo json_encode($this->model("SoalTP_model")->get_SoalTP($query));
        echo json_encode(array_merge((array) $list_jawaban, (array) $this->model("SoalTP_model")->get_SoalTP($query)));
    }

    public function get_praktikan($kelas, $kelompok)
    {
        echo json_encode($this->model("Praktikan_model")->get_praktikan("SELECT nama, nim FROM praktikan WHERE kelas='$kelas' AND kelompok='$kelompok'"));
    }
}
