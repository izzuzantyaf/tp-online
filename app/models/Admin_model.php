<?php

class Admin_model
{
    private
        $dbh;

    function __construct()
    {
        $this->dbh = new Database;
    }

    public function get_admin($query)
    {
        return $this->dbh->get($query);
    }

    public function get_admin_login()
    {
        return (object) [
            "username" => $_POST["username_admin"],
            "password" => $_POST["password_admin"]
        ];
    }

    public function ubah_password($old_password, $new_password, $new_password_confirm)
    {
        $user_logged = $_SESSION["user_logged"];
        $admin_from_db = $this->dbh->get("SELECT * FROM admin WHERE username='$user_logged->username'");

        if ($old_password === $admin_from_db->password) {
            if ($new_password === $new_password_confirm) {
                $this->dbh->query("UPDATE admin SET password='$new_password' WHERE username='$user_logged->username'");
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
        $admin_login = $this->get_admin_login();
        // ambil username dan password user yang login dari database
        $admin_from_db = $this->get_admin("SELECT * FROM admin WHERE username='$admin_login->username'");
        // validasi
        if ($admin_login->password === $admin_from_db->password) {
            // set session
            $_SESSION["user_logged"] = (object) [
                "username" => $admin_from_db->username,
                "role" => "admin"
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
}
