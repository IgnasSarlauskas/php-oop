<?php

class FileDB {

    private $file_name;

    /** @var $data array Duomenu masyvas sugeneruotas is failo */
    private $data;

    /**
     * Funkcija, kuri i klase paduoda failo pavadinima 
     */
    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    /**
     * F-ija, kuri užkrauna duomenis iš failo į $this->data
     */
    public function load() {
        $this->data = file_to_array($this->file_name);
    }
    
    /**
     * F-ija, nustatanti duomenų masyvą
     * @param type $data_array
     */
    public function setData($data_array) {
        $this->data = $data_array;
    }
    
    public function save() {
        $this->data = array_to_file($this->file_name);
    }

}
