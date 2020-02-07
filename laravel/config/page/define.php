<?php
return [
    'default' => [
        'default' => [
            'meta'   => [
                'title'       => 'タイトル',
                'description' => '明文が入ります',
                'keywords'    => 'キーワード1,キーワード2,・・・',
                'heading'     => '見出し',
                'canonical'   => '{{ self }}',
                'robots'      => 1,
                'breadcrumbs' => [
                    ['title' => 'トップ', 'url' => 'top'],
                ],
            ],
            'legacy' =>  '/',
        ],
    ],
    '/area/' => [
        'default' => [
            'meta' => [
                'breadcrumbs' => [
                    ['title' => 'トップ', 'url' => 'top'],
                    ['title' => 'エリア', 'url' => 'area_top']
                ],
            ],
            'legacy' =>  '{{ route }}',
        ],
        'pc' => [
            'meta' => [
                'heading' => 'pc',
            ],
        ],
        'sp' => [
            'meta' => [
                'heading' => 'sp'
            ],
        ],
    ],
    '/area/{prefecture_en}' => [
        'default' => [
            'meta' => [
                'keywords'    => '{{ prefecture_name }}',
                'breadcrumbs' => [
                    ['title' => 'トップ', 'url' => 'top'],
                    ['title' => 'エリア', 'url' => 'area_top']
                ],
            ],
        ],
        'pc' => [
            'meta' => [
                'heading' => 'pc',
            ],
        ],
        'sp' => [
            'meta' => [
                'heading' => 'sp'
            ],
        ],
    ],
];
