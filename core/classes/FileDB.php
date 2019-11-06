<?php

namespace Core;

class FileDB {

    private $file_name;

    /** @var $data array Duomenu masyvas sugeneruotas is failo */
    private $data;

    /**
     * Funkcija, kuri i klase paduoda failo pavadinima 
     */
    public function __construct($file_name) {
        $this->file_name = $file_name;
        $this->load();
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

    public function getRow($table_name, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            $row = $this->data[$table_name][$row_id];
            return $row;
        }

        return false;
    }

    public function insertRow($table_name, $row, $row_id = null) {
        if ($row_id !== null) {
            if (!isset($this->data[$table_name][$row_id])) {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            }
            return false;
        } else {
            $this->data[$table_name][] = $row;
            end($this->data[$table_name]);         // move the pointer to the end of array
            $row_id = key($this->data[$table_name]);
            return $row_id;
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

    public function dropTable($table_name) {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
        }
    }

    public function truncateTable($table_name) {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }

        return false;
    }

    public function rowExists($table_name, $row_id) {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }

        return false;
    }

    public function insertRowIfNotExists($table_name, $row, $row_id) {
        if ($row_id !== null) {
            $this->data[$table_name][] = $row;
            end($this->data[$table_name]);         // move the pointer to the end of array
            $row_id = key($this->data[$table_name]);
            return $row_id;
        } else {
            return false;
        }
    }

    public function updateRow($table_name, $row, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }

        return false;
    }

    public function deleteRow($table_name, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
//            $this->data[$table_name][$row_id] = [];
            unset($this->data[$table_name][$row_id]);
            return true;
        }

        return false;
    }

    public function getRowsWhere($table_name, $conditions_array) {
        if ($this->tableExists($table_name)) {
            $new_table = [];
            foreach ($this->data[$table_name] as $row_id => $row) {
                $success = true;
                foreach ($conditions_array as $condition_id => $condition) {
                    if ($row[$condition_id] !== $condition) {
                        $success = false;
                        break;
                    }
                }
                if ($success) {
                    $row['row_id'] = $row_id;
                    $new_table[$row_id] = $row;
                }
            }
            return $new_table;
        }
        return false;
    }

    public function __destruct() {
        $this->save();
    }

}
