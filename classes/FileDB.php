<?php

class FileDB {
    private $file_name;
    
    public function __construct($file_name){
        $this->file_name = $file_name;
    }
}

$info = new FileDB('info');
var_dump($info);

