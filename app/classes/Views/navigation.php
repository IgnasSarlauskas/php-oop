<?php

namespace App\Views;

class Navigation extends \Core\Views\View {

    protected $data = [
        'image' => 'media/icon.png',
        'links' => [
            [
                'url' => 'drinks.php',
                'title' => 'Drinks',
            ],
            [
                'url' => 'register.php',
                'title' => 'Register',
            ],
            [
                'url' => 'login.php',
                'title' => 'Login',
            ],
            [
                'url' => '#',
                'title' => 'Logout',
            ],
        ]
    ];

    public function __construct() {
        parent:: __construct($this->data);
    }
        

        public function render($template_path) {
            return parent::render(ROOT . '/app/templates/nav.tpl.php');
        }

}
