<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Ajax' => $baseDir . '/vendor/dereuromark/cakephp-ajax/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'TwitterBootstrap' => $baseDir . '/vendor/cakephp-brasil/twitter-bootstrap/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];