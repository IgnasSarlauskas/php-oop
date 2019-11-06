<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

use App\App;

session_start();

$modelUsers = new \App\Users\Model();

$users_array = $modelUsers->getUser();
//    var_dump($filtered_input);
if (!empty($_SESSION)) {
    foreach ($users_array as $user) {
        if ($user->getEmail() == $_SESSION['email']) {
            if ($user->getPassword() == $_SESSION['password']) {
                header('Location:index.php');
                break;
            }
        }
    }
}



