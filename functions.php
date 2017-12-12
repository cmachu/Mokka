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
    'menus' =>[
        ['main-menu', 'Main menu']
    ],
    'custom-post-types' => [
        'sample'
    ],
    'custom-hooks' =>[
        'sample-custom-hook',
    ],
    'widgets' => [
        'sample-widget'
    ],
    'sidebars' => [
        ["Sample sidebar",'sample-sidebar',"Lorem ipsum description",'<li id="%1$s" class="widget %2$s">','</li>','<h2 class="widgettitle">','</h2>']
    ],
    'shortcodes' => [
        'sample-shortcode'
    ],
    'includes' => [
      'carbon-helpers',
    ],
    'carbon_fields'=>[
        'theme-options',
        'sample-cpt-fields'
    ]
];

$mokka = new Mokka($theme_config);
$mokka->init();

