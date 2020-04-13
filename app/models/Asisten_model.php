<?php

class Asisten_model
{
    private
        $dbh;

    function __construct()
    {
        $this->dbh = new Database;
    }

    public function get_asisten($query)
    {
        return $this->dbh->get($query);
    }

    private function get_asisten_login()
    {
        return (object) [
            "username" => $_POST["kode_asisten"],
            "password" => $_POST["password_asisten"]
        ];
    }

    public function ubah_password($old_password, $new_password, $new_password_confirm)
    {
        $user_logged = $_SESSION["user_logged"];
        $asisten_from_db = $this->dbh->get("SELECT * FROM asisten WHERE kode='$user_logged->kode'");
        if ($old_password === $asisten_from_db->password) {
            if ($new_password === $new_password_confirm) {
                $this->dbh->query("UPDATE asisten SET password='$new_password' WHERE kode='$user_logged->kode'");
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function login()
    {
        // ambil username dan password user yang login
        $asisten_login = $this->get_asisten_login();
        // ambil username dan password user yang login dari database
        $asisten_from_db = $this->get_asisten("SELECT * FROM asisten WHERE kode='$asisten_login->username'");
        // validasi
        if ($asisten_login->password === $asisten_from_db->password) {
            // set session
            $_SESSION["user_logged"] = (object) [
                "nama" => $asisten_from_db->nama,
                "kode" => $asisten_from_db->kode,
                "role" => "asisten"
            ];
            // header("Location: " . BASEURL);
            return true;
        } else {
            // header("Location: " . BASEURL);
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION["user_logged"]);
        return true;
    }
}
