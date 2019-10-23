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

    public function getData() {
        return $this->data;
    }

    /**
     * F-ija, nustatanti duomenų masyvą
     * @param type $data_array
     */
    public function setData($data_array) {
        $this->data = $data_array;
    }
    
    public function createTable($table_name) {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        } 
        
        return false;
    }
    
    public function tableExists($table_name) {
        if (isset($this->data[$table_name])) {
            return true;
        }
        
        return false;
    }

    public function getRow($table, $row_id) {
        if (isset($this->data[$table])) {
            return $this->data[$table][$row_id];
        }
    }

    public function addRow($table, $row) {
        if (isset($this->data[$table])) {
            return $this->data[$table][] = $row;
        }
    }

    public function replaceRow($table, $row, $row_id) {
        if (isset($this->data[$table])) {
           return $this->data[$table][$row_id] = $row;
        }
    }

    /**
     * F-ija, irasanti masyva i faila
     */
    public function save() {
        return array_to_file($this->data, $this->file_name);
    }

}
