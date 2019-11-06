<?php

declare(strict_types = 1);

require 'config.php';

// load autoload.php

require ROOT . '/vendor/autoload.php';
$app = new \App\App();

session_start();

//require 'core/functions/file.php';
//require 'app/classes/Drinks/Drink.php';
//require 'app/classes/Sandwiches/Sandwich.php';
//require 'app/classes/FileDB.php';