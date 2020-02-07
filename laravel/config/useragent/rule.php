<?php
return [
    'Devices'          => [
    ],
    'OperatingSystems' => [
        'PlayStation' => 'PlayStation|PLAYSTATION',
    ],
    'Browsers'         => [
        'Nintendo'  => 'NintendoBrowser',
        'Silk'      => 'Silk',
        'Lunascape' => 'Lunascape',
    ],
    'Properties'       => [
        'PlayStation' => ['PlayStation [\w]* [VER]', 'PLAYSTATION [\w]* [VER]'],
        'Nintendo'    => ['NintendoBrowser/[VER]'],
        'Silk'        => ['Silk/[VER]'],
        'Lunascape'   => ['Lunascape [VER]'],
    ],
];
