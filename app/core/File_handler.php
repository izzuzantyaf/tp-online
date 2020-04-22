<?php

class File_handler
{
    private
        $file_name,
        $file_tmp_name,
        $file_error;

    public function upload_file($file = [], $what_file)
    {
        $this->file_name = $file["name"];
        $this->file_tmp_name = $file["tmp_name"];
        $this->file_error = $file["error"];
        if ($this->file_error == 0) {
            $upload_status = move_uploaded_file($this->file_tmp_name, LOCAL_BASEURL . "/files/$what_file/" . $this->file_name);
            return $upload_status;
        } else {
            return false;
        }
    }

    public function ext_validate($file_name)
    {
        $file_name_exploded = explode(".", $file_name);
        $file_ext = end($file_name_exploded);
        if (in_array($file_ext, VALID_EXT)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_dir($file_name, $what_file)
    {
        if (file_exists(LOCAL_BASEURL . "/files/$what_file/$file_name")) {
            return LOCAL_BASEURL . "/files/$what_file/$file_name";
        } else {
            return false;
        }
    }
}
