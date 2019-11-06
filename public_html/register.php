<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

use App\App;

$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Full Name',
                    'class' => 'full-name',
                ]
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ],
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
                'validate_email',
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
                'validate_password',
            ]
        ],
        'password_repeat' => [
            'type' => 'password',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Repeat password',
                    'class' => 'password',
                ],
            ],
            'validate' => [
                'validate_not_empty',
            ]
        ]
    ],
    'buttons' => [
        'register' => [
            'type' => 'submit',
            'value' => 'Register',
            'class' => 'submit-button',
        ],
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat',
        ],
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
    $user = new \App\Users\User($filtered_input);
    $modelUsers->insertUser($user);
    header('Location:login.php');
}
function form_fail($filtered_input, &$form) {}
    echo 'error';

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="./media/form-styles.css">
</head>
<body>
    <?php include './particles/navigation.php'; ?>
    <div class="form-container">
        <?php require('../core/templates/form.tpl.php'); ?>
    </div>
</body>
</html>


