<?php

require_once 'mokka/core.php';

$theme_config = [
    'version' => '1.1.0',
    'locale' => 'mokka',
    'wordpress' => [
        'admin-bar' => false,
        'autop' => true,
        'image-dimensions' => false,
        'support' => [
            'menus', 'post-thumbnails'
        ],
        'image_sizes' => [
            ['large', 700, '', true],
            ['medium', 250, '', true],
            ['small', 120, '', true],
            ['sample-tile ', 320, '', true]
        ],
    ],
    'styles' => [
        ['bootstrap', '/assets/vendor/bootstrap/dist/css/bootstrap.css',[]],
        ['font-awesome', '/assets/vendor/components-font-awesome/css/font-awesome.css',[]],
        ['ewok', '/assets/vendor/ewok/dist/ewok.css',[]],
        ['lightsaber', '/assets/vendor/lightsaber/dist/lightsaber.css',[]],
        ['style', '/style.css',[]]
    ],
    'scripts' => [
        ['bootstrap', '/assets/vendor/bootstrap/dist/js/bootstrap.js',['jquery']],
        ['tilt', '/assets/js/tilt.jquery.min.js',['jquery']],
        ['main', '/assets/js/main.js',[]],
    ],
    'custom-post-types' => [
        'sample'
    ],
    'widgets' => [ ], //todo
    'sidebars' => [ ], //todo
    'shortcodes' => [ ], //todo
    'menus' =>[
        ['main-menu', 'Main menu']
    ],
    'custom-hooks' =>[
        'sample-custom-hook',
    ],
    'includes' => [
      'helpers',
    ],
    'carbon_fields'=>[
        'theme-options',
        'sample-cpt-fields'
    ]
];


$mokka = new Mokka($theme_config);
$mokka->init();

