<?php

class Database
{
    private
        $conn,
        $server_name,
        $host,
        $username,
        $pass,
        $db_name;

    function __construct()
    {
        // get server name
        $this->server_name = $_SERVER["SERVER_NAME"];
        // decide database's config
        switch ($this->server_name) {
            case 'tponline.epizy.com':
                $this->host = "";
                $this->username = "";
                $this->pass = "";
                $this->db_name = "";
                break;
            default:
                $this->host = "localhost";
                $this->username = "root";
                $this->pass = "";
                $this->db_name = "tponline";
                break;
        }
        // connect to database
        $this->conn = mysqli_connect($this->host, $this->username, $this->pass, $this->db_name);
    }

    public function query($query)
    {
        return mysqli_query($this->conn, $query);
    }

    protected function fetch($query_result, $fetch_type = "fetch_object")
    {
        $result = [];

        switch ($fetch_type) {
            case 'fetch_row':
                while ($result[] = mysqli_fetch_row($query_result)) {
                }
                break;
            case 'fetch_assoc':
                while ($result[] = mysqli_fetch_assoc($query_result)) {
                }
                break;
            case 'fetch_array':
                while ($result[] = mysqli_fetch_array($query_result)) {
                }
                break;
            case 'fetch_object':
                while ($result[] = mysqli_fetch_object($query_result)) {
                }
                break;
            default:
                while ($result[] = mysqli_fetch_object($query_result)) {
                }
                break;
        }

        // remove the last element because it's NULL
        array_pop($result);
        return $result;
    }

    public function get($query, $fetch_type = "fetch_object")
    {
        // query
        $query_result = $this->query($query);
        // array of result
        $array_result = $this->fetch($query_result, $fetch_type);
        // return the array of the result
        if (count($array_result) === 1) {
            return $array_result[0];
        } else {
            return $array_result;
        }
    }
}
