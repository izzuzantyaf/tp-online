<?php

class SoalTP_model
{
    private
        $dbh,
        $fh;

    public function __construct()
    {
        $this->dbh = new Database;
        $this->fh = new File_handler;
    }

    public function get_soalTP()
    {
    }

    public function upload($array_soal_kunci)
    {
        $array_soal_kunci = (object) $array_soal_kunci;
        // upload gambar
        // ada apa belum?
        $is_exists = false;

        if (
            empty($this->dbh->get("SELECT giliran,modul FROM soal_tp WHERE giliran='$array_soal_kunci->giliran_tp' AND modul='$array_soal_kunci->modul'"))
        ) {
        } else {
            $is_exists = !$is_exists;
        }

        // kalau belum maka tambahkan
        // kalau ada maka update
        // 
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
