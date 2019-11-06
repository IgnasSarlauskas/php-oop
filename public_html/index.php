<?php

require '../core/functions/file.php';
require '../bootloader.php';
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

$alus = [
    'name' => 'alus',
    'amount' => 500,
    'abarot' => 5,
    'image' => null,
    'id' => 1236,
];

$sultys = [
    'name' => 'sultys',
    'amount' => 300,
    'abarot' => 5,
    'image' => 'url()',
    'id' => 1244,
];

//$fileDB = new \Core\FileDB(DB_FILE);
$modelDrinks = new \App\Drinks\Model();

$strongDrink = new \App\Drinks\StrongDrink($alus);
$strongDrink->getAmount();
//var_dump($strongDrink->getImage());
//var_dump($strongDrink);


//$sultys_drink = new\App\Drinks\Drink($sultys);
//$alus_drink = new\App\Drinks\Drink($alus);
//
//
//$modelDrinks->insert($sultys_drink);
//$modelDrinks->insert($alus_drink);
//var_dump($modelDrinks);
// Inputs form array

$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'name',
                ],
            ],
            'validate' => [
                'validate_not_empty',
//                'validate_email_unique',
            ]
        ],
        'amount' => [
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'amount',
                ]
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'abarot' => [
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'abarotai',
                ]
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'image' => [
            'type' => 'url',
            'extra' => [
                'attr' => [
                    'placeholder' => 'picture url',
                ]
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'select' => [
            'type' => 'select',
            'extra' => [
                'attr' => [
                    'placeholder' => 'select',
                ],
                'options' => [],
            ],
            'valdiate' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'name' => 'action',
            'value' => 'submit',
            'type' => 'submit',
        ],
        'update' => [
            'name' => 'action',
            'value' => 'update',
            'type' => 'submit',
        ],
        'delete' => [
            'name' => 'action',
            'value' => 'delete',
            'type' => 'submit',
        ],
    ],
    'validators' => [],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];


$filtered_input = get_filtered_input($form);

foreach ($modelDrinks->get() as $drink) {
    $form['fields']['select']['options'][$drink->getId()] = $drink->getName();
}


function form_success($filtered_input, $form) {
    $modelDrinks = new \App\Drinks\Model();
    $drink = new \App\Drinks\Drink($filtered_input);
//    var_dump($modelDrinks->insert($drink));
    $modelDrinks->insert($drink);
}

function form_fail($filtered_input, &$form) {
    
}

$button = get_form_action();

switch ($button) {
    case 'submit':
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
        }
        break;
    case 'delete':
        $modelDrinks->deleteAll();
        break;
    case 'update':
        session_start();
        $filtered_input = get_filtered_input($form);
//        $modelDrinks->get(['name' => 'smirnof']);
        $_SESSION = [
            'id' => $filtered_input['select'],
        ];
        header('Location:update.php');
}



//$user_array = ['name' => 'test', 'email' => 'email@email.com', 'password' => 'password'];
//$user1 = new \App\Users\User($user_array);
//var_dump($user1);
?>

<html>
    <head>
        <title>index</title>
        <link rel="stylesheet" href="../public_html/media/style.css">
         <link rel="stylesheet" href="./media/form-styles.css">
    </head>
    <style>
        .img {
            width: 150px;
            height: 205px;
        }

        .drinks-container {
            display: flex;

        }

        .drink-container {
            display: block;
            margin: 0 auto;
            margin-top: 450px;
        }

        .center {
            text-align: center;
        }

    </style>
    <body>
        <?php include './particles/navigation.php'; ?>
        <div class="form-container"> <?php require('../core/templates/form.tpl.php'); ?></div>
        <div class="drink-container">
            <?php foreach ($modelDrinks->get() as $drink_id => $drink): ?>
                <div class="drink-container">
                    <img  class ="img" alt="<?php $drink->getName(); ?>" src="<?php print $drink->getImage(); ?>">
                    <div class=""><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class=""><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class=""><?php print "Turis {$drink->getAmount()} ml"; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        
    </body>
</html>




