<?php

abstract class PassengerCar {

    protected $manufacturer;
    protected $model;
    protected $year;
    protected $wheel_count;
    protected $door_count;

    public function __construct($manufacturer, $model, $year, $wheel_count, $door_count) {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->year = $year;
        $this->wheel_count = $wheel_count;
        $this->door_count = $door_count;
    }

    abstract public function drive();

    public function getWheels() {
        print "$this->model turi $this->wheel_count ratus";
    }

    public function getDoors() {
        print "$this->model turi $this->door_count duris";
    }

}

abstract class Toyota extends PassengerCar {

    public function __construct($model, $year, $wheel_count, $door_count) {
        parrent::__construct('Toyota', $model, $year, $wheel_count, $door_count);
    }

}

class Corolla extends Toyota {

    public function __constructor($year) {
        parrent::__construct('Corolla', $year, 4, 4);
    }
    
    public function drive() {
        print "vaziuoja letai";
    }

}

$corolla = new Corolla(2000);

var_dump($corolla);
$corolla->drive();


