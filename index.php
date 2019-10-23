<?php

require 'functions/file.php';
require 'classes/FileDB.php';

//$info = new FileDB('info');
//var_dump($info);

$db = new FileDB('test.json');
//$db->setData(['table' => []]);


//$db->save();
//var_dump($db);
//var_dump($db->getRow(0, 'table'));
//var_dump($db->addRow('table', ['key2' => 'value2']));
//var_dump($db->addRow('table', ['key3' => 'value3']));
//var_dump($db->replaceRow('table', ['key3'=>'replaced'], 1));

var_dump($db->createTable('teible'));


