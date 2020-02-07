<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '同意してください。',
    'active_url'           => '無効なURLです。',
    'after'                => '翌日以降の日付を入力してください。',
    'after_or_equal'       => '当日以降の日付を入力してください。',
    'alpha'                => 'アルファベットで入力してください。',
    'alpha_dash'           => 'アルファベット・数字・ダッシュで入力してください。',
    'alpha_num'            => 'アルファベット・数字で入力してください。',
    'array'                => '配列を入力してください。',
    'before'               => '前日以前の日付を入力してください。',
    'before_or_equal'      => '当日以前の日付を入力してください。',
    'between'              => [
        'numeric' => ':min 以上、:max 以下の値を入力してください。',
        'file'    => ':min KB以上、:max KB以下のファイルを選択してください。',
        'string'  => ':min 文字以上、:max 文字以下で入力してください。',
        'array'   => ':min 項目～:max 項目入力してください。',
    ],
    'boolean'              => 'どちらかを選択してください。',
    'confirmed'            => '不一致です。',
    'date'                 => '無効な日付です。',
    'date_format'          => '無効な日付です。',
    'different'            => '既に存在しています。',
    'digits'               => ':digits 桁で入力してください。',
    'digits_between'       => ':min 桁以上、:max 桁以下で入力してください。',
    'dimensions'           => '無効な画像サイズです。',
    'distinct'             => '重複しています。',
    'email'                => '無効なメールアドレスです。',
    'exists'               => '選択された要素は無効です。',
    'file'                 => 'ファイルをアップロードしてください。',
    'filled'               => '該当する項目を選択してください。',
    'image'                => '画像ファイルを選択してください。',
    'in'                   => '選択された要素は無効です。',
    'in_array'             => '存在しません。',
    'integer'              => '整数を入力してください。',
    'ip'                   => '無効なIPアドレスです。',
    'json'                 => '無効な文字列です。',
    'max'                  => [
        'numeric' => ':max 以下の値を入力してください。',
        'file'    => ':max KB以下のファイルを選択してください。',
        'string'  => ':max 文字以下で入力してください。',
        'array'   => ':max 項目以下入力してください。',
    ],
    'mimes'                => '正しいファイルを選択してください。',
    'mimetypes'            => '正しいファイルを選択してください。',
    'min'                  => [
        'numeric' => ':min 以上の値を入力してください。',
        'file'    => ':min KB以上のファイルを選択してください。',
        'string'  => ':min 文字以上で入力してください。',
        'array'   => ':min 項目以上入力してください。',
    ],
    'not_in'               => '選択された要素は無効です。',
    'numeric'              => '数値を入力してください。',
    'present'              => '該当するものが見つかりませんでした。',
    'regex'                => '無効なフォーマットです。',
    'required'             => '必須項目です。',
    'required_if'          => '必須項目です。',
    'required_unless'      => '必須項目です。',
    'required_with'        => '必須項目です。',
    'required_with_all'    => '必須項目です。',
    'required_without'     => '必須項目です。',
    'required_without_all' => '必須項目です。',
    'same'                 => '不一致です。',
    'size'                 => [
        'numeric' => ':size の値を入力してください。',
        'file'    => ':size KBのファイルを選択してください。',
        'string'  => ':size 文字で入力してください。',
        'array'   => ':size 項目入力してください。',
    ],
    'string'               => '文字列のみ入力可能です。',
    'timezone'             => '無効なタイムゾーンです。',
    'unique'               => '既に使用されています。',
    'uploaded'             => 'アップロードできませんでした。',
    'url'                  => '無効なURLです。',

    // 独自バリデーション用メッセージ
    'double_precision_pg'  => '範囲内の数値で入力してください。',
    'enable_if'            => ':attribute が :value のときのみ入力可能です。',
    'empty_with'           => 'フォーム内に同時に入力できない値が含まれています。',
    'empty_with_all'       => 'フォーム内に同時に入力できない値が含まれています。',
    'empty_without'        => 'フォーム内に関連する値が入力されていません。',
    'empty_without_all'    => 'フォーム内に関連する値が入力されていません。',
    'geo'                  => '無効な緯度経度です。',
    'greater'              => ':min より大きな値を入力してください。',
    'greater_or_equal'     => ':min 以上の値を入力してください。',
    'hiragana'             => 'ひらがなで入力してください。',
    'integer_pg'           => '範囲内の整数を入力してください。',
    'intersection'         => '不正な値です。',
    'katakana'             => 'カタカナで入力してください。',
    'less'                 => ':max より小さな値を入力してください。',
    'less_or_equal'        => ':max 以下の値を入力してください。',
    'numeric_pg'           => '範囲内の数値で入力してください。',
    'phone'                => '無効な電話番号です。',
    'serial_pg'            => '範囲内の自然数で入力してください。',
    'zipcode'             => '郵便番号が間違えています。',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
