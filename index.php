<?php

require 'functions/file.php';
require 'classes/Drinks/Drink.php';
require 'classes/Sandwiches/Sandwich.php';
require 'classes/FileDB.php';

//$info = new FileDB('info');
//var_dump($info);
//$db = new FileDB('test.json');
//$db->setData(['table' => []]);
//var_dump($db);
//$db->createTable('table');
//$db->getData();
//
//$db->insertRow('table', ['key' => 'value2']);
//$db->insertRow('table', ['key' => 'value3']);
//$db->insertRow('table', ['key' => 'value4']);
//$db->insertRow('table', ['key' => 'value5']);
//var_dump($db->getRow('table', 0));
//var_dump($db->replaceRow('table', ['key3'=>'replaced'], 1));
//var_dump($db->insertRow('table','innerTable'));
//var_dump($db);
//var_dump($db->rowExists('table',2));
//var_dump($db->getRowsWhere('table', ['key' => 'value4']));

$array = [
    'name' => 'alus',
    'amount' => 500,
    'abarot' => 5,
    'image' => 'url()',
//    'id' => 1236,
];

$array1 = [
    'name' => 'sultys',
    'amount' => 300,
    'abarot' => 5,
    'image' => 'url()',
//   'id' => 1236,
];

$drink = new Drink($array);
$drink->setData($array1);
var_dump($drink);

$array_sandwich = [
    'name' => 'BigMac',
//    'price' => 5,
    'vegan' => false,
    'image' => 'url',
    
];

$array_sandwich2 = [
    'name' => 'CheeseBurger',
    'price' => 4,
    'vegan' => false,
    'image' => 'url',
];

$bigMac = new Sandwich($array_sandwich);
//$bigMac->setData([]);
//var_dump($bigMac->getData());
var_dump($bigMac);




