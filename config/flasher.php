<?php // config/flasher.php

return [
    'plugins' => [
        'notyf' => [
            'scripts' => [
                '/vendor/flasher/flasher-notyf.min.js',
            ],
            'styles' => [
                '/vendor/flasher/flasher-notyf.min.css',
            ],
            'options' => [
               'position' => [
                    'y' => 'top',
               ],
            ],
        ],
    ],
];
