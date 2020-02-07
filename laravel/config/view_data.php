<?php

return [
    /**
     * view共通で使用する変数を登録する
     */
    'register' => [
        'meta' => Lvgs\Laravel\BaseController\ViewDataRegister\DataSender\MetaDataSender::class,
        'project' => App\Library\ViewDataRegister\ProjectDataSender::class,
    ]
];
