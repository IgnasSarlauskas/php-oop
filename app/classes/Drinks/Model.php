<?php

namespace App\Drinks;

use Core\FileDB;
use App\App;

class Model {

    private $db;
    private $table_name = 'drinks';

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
     * @param Drink $drink
     * Konvertuoja Drink objekta i array ir iraso i lentele FileDB objekte.
     */
    public function insert(Drink $drink) {
        return App::$db->insertRow($this->table_name, $drink->getData());
    }

    /**
     * Suranda Drink objektus, kurie turi $conditions pateiktas savybes ir jas grazina naujame array.
     * @param array $conditions
     * @return array
     */
    public function get(array $conditions = []) {

        $array = App::$db->getRowsWhere($this->table_name, $conditions);
        $new_array = [];
        foreach ($array as $object_id => $object) {
            $object['id'] = $object['row_id'];
            if ($object['abarot'] > 20) {
                $new_array[] = new StrongDrink($object);
            } else {
                $new_array[] = new LightDrink($object);
            }
        }
        return $new_array;
    }

    /**
     * @param Drink $drink
     * @return bool
     * paduodamas Drink objektas $drink turi tureti 'id'.
     * Pagal ji perrasomas anksciau buves objektas su tuo id.
     */
    public function updateDrink(Drink $drink) {
        $drink_array = $drink->getData();
        return App::$db->updateRow($this->table_name, $drink_array, $drink_array['id']);
    }

    /**
     * @param Drink $drink
     * @return bool
     * Panaudojus funkcija getDrinks ir sukurus jai variable.
     * Sukamas foreach per sukurta variable ir foreach viduje iskvieciam sia funkcija.
     * Si funkcija istrina objekta Drink getDrinks funkcija gautus objektus.
     */
    public function deleteDrink(Drink $drink) {
        $drink_array = $drink->getData();
        return App::$db->deleteRow($this->table_name, $drink_array['id']);
    }

    /**
     * @return bool
     * Funkcija istrina visus Drink objektus esancius lenteleje.
     */
    public function deleteAll() {
        return App::$db->truncateTable($this->table_name);
    }

}
