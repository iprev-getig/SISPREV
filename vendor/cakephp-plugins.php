<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Ajax' => $baseDir . '/vendor/dereuromark/cakephp-ajax/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakeExcel' => $baseDir . '/vendor/dakota/cake-excel/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'TwitterBootstrap' => $baseDir . '/vendor/cakephp-brasil/twitter-bootstrap/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];