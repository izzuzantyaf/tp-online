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

    public function get_soalTP($query)
    {
        return $this->dbh->get($query);
    }

    public function upload_file($files)
    {
        // cek ekstensi
        if ($this->fh->ext_validate($files["name"])) {
            // upload
            return $this->fh->upload_file($files, 'soal_tp/' . $_POST['giliran'] . '/' . $_POST['modul']);
        } else {
            return false;
        }
    }

    public function add_to_db($array_soal_kunci)
    {
        $query = "";

        if (empty($this->get_soalTP("SELECT giliran,modul FROM soal_tp WHERE giliran='$array_soal_kunci->giliran' AND modul='$array_soal_kunci->modul'"))) {
            $query = "INSERT INTO soal_tp (";
            foreach ($array_soal_kunci as $key => $value) {
                $query .= "$key, ";
            }
            $query = rtrim($query, ', ');
            $query .= ") VALUES ('" . implode("', '", (array) $array_soal_kunci) . "')";
        } else {
            $query = "UPDATE soal_tp SET ";
            foreach ($array_soal_kunci as $key => $value) {
                $query .= "$key='$value', ";
            }
            $query = rtrim($query, ', ');
            $query .= " WHERE giliran='$array_soal_kunci->giliran' AND modul='$array_soal_kunci->modul'";
        }

        // var_dump($query);
        // var_dump($this->dbh->query($query));
        if ($this->dbh->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($array_soal_kunci, $files)
    {
        // upload semua file
        foreach ($files as $key => $file) {
            if ($this->upload_file($file)) {
                // jika berhasil diupload tambahkan nama file nya ke array yang disiapkan untuk ditulis di database
                $array_soal_kunci[$key] = $file['name'];
            }
        }
        unset($array_soal_kunci['upload_soal_submit_btn']);
        $array_soal_kunci = (object) $array_soal_kunci;
        // tambahkan ke database
        return $this->add_to_db($array_soal_kunci);
    }

    public function update($pre_edited_questions)
    {
    }

    public function delete($modul, $giliran)
    {
        $this->dbh->query("DELETE FROM soal_tp WHERE modul='$modul' AND giliran='$giliran'");
    }
}
