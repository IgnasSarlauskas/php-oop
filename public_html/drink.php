<?php
require '../core/functions/file.php';
require '../bootloader.php';
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');



$form = [
    'attr' => [],
    'fields' => [
        'select' => [
            'type' => 'select',
            'extra' => [
                'attr' => [
                    'placeholder' => 'take a sip',
                ],
                'options' => [],
            ],
            'valdiate' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'Take A Drink' => [
            'name' => 'action',
            'value' => 'submit',
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
$modelDrinks = new \App\Drinks\Model();

$model_drinks_array = $modelDrinks->get();

$button = get_form_action();

if ($button == 'Take A Drink') {
    $filtered_input = get_filtered_input($form);
    var_dump($filtered_input);
    if (!empty($filtered_input)) {

        validate_form($filtered_input, $form);
    }
}

foreach ($modelDrinks->get() as $drink) {
    var_dump($drink);
    $form['fields']['select']['options'][$drink->getId()] = $drink->getName();
}

function form_success($filtered_input, $form) {
    $modelDrinks = new \App\Drinks\Model();
    var_dump($filtered_input['select']);
    $drinks = $modelDrinks->get();
    $drink = $drinks[$filtered_input['select']];
    $drink->drink();
    $modelDrinks->updateDrink($drink);
    var_dump($drink->getAmount());
    if ($drink->getAmount() == 0) {
        $modelDrinks->deleteDrink( $drink);
        
    }
    $modelDrinks->updateDrink($drink);
}

?>

<html>
    <head>
        <title>index</title>
        <!--<link rel="stylesheet" href="../public_html/media/style.css"> -->
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
                    <div class=""><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class=""><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class=""><?php print "Turis {$drink->getAmount()} ml"; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-container"> <?php require('../core/templates/form.tpl.php'); ?></div>
    </body>
</html>

