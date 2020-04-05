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

    public function login()
    {
        // ambil username dan password user yang login
        $asisten_login = $this->get_asisten_login();
        // ambil username dan password user yang login dari database
        $asisten_from_db = $this->get_asisten("SELECT * FROM asisten WHERE kode='$asisten_login->username'");
        // validasi
        if ($asisten_login->password === $asisten_from_db->password) {
            // set session
            $_SESSION["user_logged"] = [$asisten_from_db->nama, $asisten_from_db->kode];
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
