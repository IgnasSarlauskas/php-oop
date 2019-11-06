<?php
require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

session_start();

var_dump($_SESSION);

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
      
    ],
    'buttons' => [
        'update' => [
            'name' => 'action',
            'value' => 'update',
            'type' => 'submit',
        ],
        'cancel' => [
            'name' => 'action',
            'value' => 'cancel',
            'type' => 'submit',
        ],
    ],
    'validators' => [],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];

$modelDrinks = new \App\Drinks\Model();
$model_drinks_array = $modelDrinks->get();

foreach ($model_drinks_array as $drink_id => $drink) {
    if ($drink->getId() == $_SESSION['id']) {
        $key_of_updatable_drink = $drink_id;
    } else {
        false;
    }
}
$drink = $model_drinks_array[$key_of_updatable_drink];

$button = get_form_action();

switch ($button) {
    case 'update':
        $filtered_input = get_filtered_input($form);
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
            
        }
        break;
    case 'cancel':
        header('Location:index.php');
        break;
}

function form_success($filtered_input, $form) {
    $modelDrinks = new \App\Drinks\Model();
    $filtered_input['id'] = $_SESSION['id'];
    var_dump($filtered_input);
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->updateDrink($drink);
}

function form_fail($filtered_input, &$form) {
    
}
?>

<html>
    <head>
        <title>update</title>
        <link rel="stylesheet" href="../public_html/media/style.css">  
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
        }

        .center {
            text-align: center;
        }

    </style>
    <body>
        <?php include './particles/navigation.php'; ?>
        <div class="drinks-container">
            <?php foreach ($modelDrinks->get() as $drink_id => $drink): ?>
                <div class="drink-container">
                    <img  class ="img" alt="<?php $drink->getName(); ?>" src="<?php print $drink->getImage(); ?>">
                    <div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-container"> <?php require('../core/templates/form.tpl.php'); ?></div>
    </body>
</html>
