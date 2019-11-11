<?php
require '../bootloader.php';

$modelDrinks = new \App\Drinks\Model();

$form = [
    'title' => 'Insert Drink',
    'fields' => [
        'name' => [
            'type' => 'text',
            'label' => 'Drink name:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pavadinimas',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'amount_ml' => [
            'type' => 'number',
            'label' => 'Amount in ml:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Talpa',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'label' => 'Abarot:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Laipsniai',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'image' => [
            'type' => 'url',
            'label' => 'Image URL:',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Paveikslelio nuoroda',
                ],
            ],
            'validators' => [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'insert' => [
            'type' => 'submit',
        ],
        'delete all' => [
            'type' => 'submit',
        ]
    ],
    'callbacks' => [
        'success' => 'form_success'
    ],
];

function form_success($filtered_input, &$form) {
    $modelDrinks = new \App\Drinks\Model();
    $drink = new App\Drinks\Drink($filtered_input);
    $modelDrinks->insert($drink);
}

$filtered_input = get_filtered_input($form);
$button = get_form_action();

switch ($button) {
    case 'insert':
        if (!empty($filtered_input)) {
            validate_form($filtered_input, $form);
        }
        break;
    case 'delete all':
        $modelDrinks->deleteAll();
        break;
}

//$cookie = new \Core\Cookie('newCookie');
//$cookie->save(['verte']);
//$cookie->delete();
//$nav = [
//    'image' => 'media/icon.png',
//    'links' => [
//        [
//            'url' => 'drinks.php',
//            'title' => 'Drinks',
//        ],
//        [
//            'url' => 'register.php',
//            'title' => 'Register',
//        ],
//        [
//            'url' => 'login.php',
//            'title' => 'Login',
//        ],
//        [
//            'url' => '#',
//            'title' => 'Logout',
//        ],
//    ]
//];

$formView = new \Core\Views\View($form);

$navigationView = new \App\Views\Navigation();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!--Require navigation-->
        <?php print $navigationView->render(ROOT . '/app/templates/nav.tpl.php'); ?>

        <!--Require form template-->
        <?php if (isset($_SESSION['logged_in_user'])): ?>
            <?php require ROOT . '/core/templates/form.tpl.php'; ?>
        <?php else: ?>
            <div class="wrapper">
                <p>Nori įrašyti gėrimą? <a href="login.php">Prisijunk!</a></p>
            </div>
        <?php endif; ?>

        <div class="catalogue">
            <div class="wrapper">
                <?php foreach ($modelDrinks->get() as $drink): ?>
                    <div class="bottle">
                        <img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
                        <div class='name'><?php print $drink->getName(); ?></div>
                        <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                        <div class="Amount"><?php print "Tūris {$drink->getAmount()} ml"; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<!--        <script src="js/fetch.js"></script>-->
        <script>

            const formData = new FormData();

            formData.append('name','Sprite');

            fetch('api/drinks/get.php', {
                method: 'POST',
                body: formData
            })
                    .then(response => response.json())
                    .then(data => console.log(data.data));
        </script>
    </body>
</html>