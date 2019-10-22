<?php

class FileDB {

    private $file_name;
    private $data;

    /**
     *
     * Calls when new object is created
     *
     * @param   $file_name
     * @return  string value
     *
     */
    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    public function load() {
        $this->data = file_to_array($this->file_name);
    }
    
    public function setData($data_array) {
        $this->data = $data_array;
    }
}
