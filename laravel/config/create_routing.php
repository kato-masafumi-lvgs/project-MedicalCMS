<?php
return [
    'controller' => [
        'extends' => [
            'default' => 'Lvgs\Laravel\BaseController\Routing\WebController',
            'api'     => 'Lvgs\Laravel\BaseController\Routing\ApiController',
        ]
    ],
    'vue' => [
        'DummyVueImportPath' => 'vue',
        'DummyVueElement' => '.l-main'
    ]
];