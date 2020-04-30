<?php

class TP_model
{
    private
        $dbh,
        $fh;

    public function __construct()
    {
        $this->dbh = new Database;
        $this->fh = new File_handler;
    }

    public function get_TP($query)
    {
        return $this->dbh->get($query);
    }

    public function upload_jawaban_image($files)
    {
        // cek ekstensi
        if ($this->fh->ext_validate($files["name"])) {
            // upload
            return $this->fh->upload_file($files, "jawaban/" . $_POST['giliran'] . '/' . $_POST['modul']);
        } else {
            return false;
        }
    }

    public function add_to_db($prepared_data)
    {
        $query = "";

        if (empty($this->get_TP("SELECT nim FROM tugas_pendahuluan$prepared_data->giliran WHERE nim='$prepared_data->nim'"))) {
            $query = "INSERT INTO tugas_pendahuluan$prepared_data->giliran (";
            unset($prepared_data->giliran);
            foreach ($prepared_data as $key => $value) {
                $query .= "$key, ";
            }
            $query = rtrim($query, ', ');
            $query .= ") VALUES ('" . implode("', '", (array) $prepared_data) . "')";
        } else {
            $query = "UPDATE tugas_pendahuluan$prepared_data->giliran SET ";
            unset($prepared_data->giliran);
            foreach ($prepared_data as $key => $value) {
                $query .= "$key='$value', ";
            }
            $query = rtrim($query, ', ');
            $query .= " WHERE nim='$prepared_data->nim'";
        }
        return  $this->dbh->query($query);
    }

    public function submit_jawaban($prepared_data, $files)
    {
        // upload semua image
        foreach ($files as $key => $file) {
            if ($this->upload_jawaban_image($file))
                // jika berhasil diupload tambahkan nama file nya ke array yang disiapkan untuk ditulis di database
                $prepared_data[$key] = $file['name'];
        }

        // tambahkan ke database
        $prepared_data = (object) $prepared_data;
        return $this->add_to_db($prepared_data);
    }

    public function submit_nilai($giliran, $jml_nilai, $pengoreksi, $nim, $modul)
    {
        $this->dbh->query("UPDATE tugas_pendahuluan1 SET nilai='$jml_nilai', pengoreksi='$pengoreksi' WHERE nim='$nim' AND modul='$modul'");
    }
}
