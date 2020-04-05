<?php

class Praktikan_model
{
    private
        $dbh;

    function __construct()
    {
        $this->dbh = new Database;
    }

    public function get_praktikan($query)
    {
        return $this->dbh->get($query);
    }

    private function get_praktikan_login()
    {
        // $username = $_POST["nim_praktikan"];
        // $password = $_POST["password_praktikan"];
        return (object) [
            "username" => $_POST["nim_praktikan"],
            "password" => $_POST["password_praktikan"]
        ];
    }

    public function login()
    {
        // ambil username dan password user yang login
        $praktikan_login = $this->get_praktikan_login();
        // ambil username dan password user yang login dari database
        $praktikan_from_db = $this->get_praktikan("SELECT * FROM praktikan WHERE nim='$praktikan_login->username'");
        // validasi
        if ($praktikan_login->password === $praktikan_from_db->password) {
            // set session
            $_SESSION["user_logged"] = [$praktikan_from_db->nama, $praktikan_from_db->kelas . " " . $praktikan_from_db->kelompok];
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
