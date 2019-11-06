<?php

namespace App\Users;

use Core\FileDB;
use App\App;

class Model {
    private $db;
    private $table_name = 'users';
    
     /**
     * Model constructor.
     * Sukuria FileDB objekta su failu nurodytu config.php
     * Sukuria lentele FileDB objekte pagal modelyje nurodyta $table_name
     */
    public function __construct() {
        $this->db = App::$db;
        App::$db->createTable($this->table_name);
    }
    
    /**
     * @param User $user
     * Konvertuoja User objekta i array ir iraso i lentele FileDB objekte.
     */
    public function insertUser(User $user) {
        return App::$db->insertRow($this->table_name, $user->getData());
    }
    
     /**
     * Suranda User objektus, kurie turi $conditions pateiktas savybes ir jas grazina naujame array.
     * @param array $conditions
     * @return array
     */
    public function getUser(array $conditions=[]) {
        
        $array = App::$db->getRowsWhere($this->table_name, $conditions);
        $new_array = [];
        foreach ($array as $object_id => $object) {
            $object['id'] = $object['row_id'];
            $new_array[] = new User($object);
        }
        return $new_array;
    }
    
    /**
     * @param User $user
     * @return bool
     * paduodamas User objektas $user turi tureti 'id'.
     * Pagal ji perrasomas anksciau buves objektas su tuo id.
     */
    public function updateUser(User $user) {
        $user_array = $user->getData();
        return App::$db->updateRow($this->table_name, $user_array, $user_array['id']);
    }
    
    /**
     * @param User $user
     * @return bool
     * Panaudojus funkcija getUsers ir sukurus jai variable.
     * Sukamas foreach per sukurta variable ir foreach viduje iskvieciam sia funkcija.
     * Si funkcija istrina objekta Drink getDrinks funkcija gautus objektus.
     */
    
    public function deleteUser(User $user) {
        $user_array = $user->getData();
        return App::$db->deleteRow($this->table_name, $user_array['id']);
    }
    
    /**
     * @return bool
     * Funkcija istrina visus User objektus esancius lenteleje.
     */
    
    public function deleteAll() {
        return App::$db->truncateTable($this->table_name);
    }
}