<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

use App\App;

$form = [
    'attr' => [],
    'fields' => [
        'email' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'email',
                ],
            ],
            'validate' => [
                'validate_not_empty',
                'validate_email_exists',
//                'validate_email',
                'validate_email_unique',
            ]
        ],
        'password' => [
            'type' => 'password',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Password',
                    'class' => 'password',
                ]
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ],
    ],
    'buttons' => [
        'login' => [
            'type' => 'submit',
            'value' => 'Login',
            'class' => 'submit-button',
        ],
    ],
    'validators' => [
       'validate_login',
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];


$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}

function form_success($filtered_input, $form)
{
    $modelUsers = new \App\Users\Model();
    $users_array = $modelUsers->getUser();
    var_dump($filtered_input);
    foreach ($users_array as $user) {
        if ($user->getEmail() == $filtered_input['email'] && $user->getPassword() == $filtered_input['password']) {
            $_SESSION = [
                'email' => $filtered_input['email'],
                'password' => $filtered_input['password'],
            ];
            header('Location:success.php');
            break;
        }
    }
}
function form_fail($filtered_input, &$form) {}

$cookie = new Core\Cookie('cookie_test');

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="./media/form-styles.css">
</head>
<body>
    <?php include './particles/navigation.php'; ?>
    <?php require('../core/templates/form.tpl.php'); ?>
</body>
</html>
