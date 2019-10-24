<?php

require 'functions/file.php';
require 'classes/drinks/FileDB.php';
require 'classes/FileDB.php';

//$info = new FileDB('info');
//var_dump($info);

$db = new FileDB('test.json');
//$db->setData(['table' => []]);



//var_dump($db);

$db->createTable('table');
$db->getData();

$db->insertRow('table', ['key' => 'value2']);
$db->insertRow('table', ['key' => 'value3']);
$db->insertRow('table', ['key' => 'value4']);
$db->insertRow('table', ['key' => 'value5']);

//var_dump($db->getRow('table', 0));
//var_dump($db->replaceRow('table', ['key3'=>'replaced'], 1));



//var_dump($db->insertRow('table','innerTable'));

var_dump($db);
//var_dump($db->rowExists('table',2));
var_dump($db->getRowsWhere('table', ['key' => 'value4']));

