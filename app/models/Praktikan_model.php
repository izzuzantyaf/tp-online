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
            $_SESSION["user_logged"] = (object) [
                "nama" => $praktikan_from_db->nama,
                "nim" => $praktikan_from_db->nim,
                "kelas" => $praktikan_from_db->kelas,
                "kelompok" => $praktikan_from_db->kelompok,
                "role" => "praktikan"
            ];
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION["user_logged"]);
        return true;
    }

    public function ubah_password($old_password, $new_password, $new_password_confirm)
    {
        $user_logged = $_SESSION["user_logged"];
        $praktikan_from_db = $this->dbh->get("SELECT * FROM praktikan WHERE nim='$user_logged->nim'");
        if ($old_password === $praktikan_from_db->password) {
            if ($new_password === $new_password_confirm) {
                $this->dbh->query("UPDATE praktikan SET password='$new_password' WHERE nim='$user_logged->nim'");
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
