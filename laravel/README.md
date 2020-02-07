# lvgs/laravel

## 概要

[tool-ProjectCreator](https://github.com/lvgs/tool-ProjectCreator)で作成されるLaravelの雛形です。
[laravel-LVM](https://github.com/lvgs/laravel-LVM)に関連した機能の有無を、ブランチで管理しています。
- master -> lvm関連機能なし
- master-lvm -> lvm関連機能つき

※このリポジトリの運用担当者は、[運用方法](##運用方法)を参照のこと。

## 初期設定

### GlobalScope

`app/GlobalScopes`にグローバルスコープを設定したいEloquentと同名のファイルを作成

開発手順の詳細は[こちら](https://github.com/lvgs/laravel-Lvm/blob/master/README.md#プロジェクト側からのglobalscopeの設定)

### gulpタスク

gulpタスクは [lvgs-bootstrap](https://github.com/lvgs/bootstrap) によって定義されています。

詳細は [lvgs-bootstrapのドキュメント](https://github.com/lvgs/bootstrap/README.md) を参照してください。

各媒体では、以下の修正が必要です

#### package.jsonの編集

package.jsonの以下の行を編集します。

```
"lvgs-bootstrap-admin": "git+ssh://git@github.com:lvgs/bootstrap-Admin.git",
```

媒体専用のbootstrapがある場合は、そのbootstrapの名前とgithub上のURLを指定します。

管理画面の場合は[bootstrap-Admin](https://github.com/lvgs/bootstrap-Admin) を使用するのでそのままでOKです。

#### gulpfile.jsの編集

gulpfile.jsの以下の行を編集します。

```javascript
/**
 * @type {BootstrapAdmin}
 */
const bootstrap = require('lvgs-bootstrap-admin')();
```

`@type {BootstrapAdmin}`と`lvgs-bootstrap-admin`の箇所を、package.jsonで指定したbootstrapに合わせて編集します。

その他、必要な設定があれば、[lvgs-bootstrapのドキュメント](https://github.com/lvgs/bootstrap/README.md) を参照して編集してください。

## .lvgs.gitignore

[tool-GitHooks](https://github.com/lvgs/tool-GitHooks) に実装されている`post-commit` `pre-commit`によって
媒体側からのコミットが制限されます。

## 運用方法

運用にあたり、本リポジトリに変更を加える際はお読みください。

1. lvgs/laravelに変更を加える時
    1. masterのみ、master-lvmのみに加えたい時
        - 特筆事項なし
    1. 共通のアップデートを加えたいとき
        - まずmasterを変更する。（mergeするところまで完了させる）
        - masterの変更をmaster-lvmに反映する（同じリポジトリのbranch同士なので操作はgithub上でできる）
            - [Pull requests](https://github.com/lvgs/laravel/pulls)から`New pull request`を選択
            - `base`を`master-lvm`に、`compare`を`master`にして、`Able to merge`ならプルリクを出す
        - conflictが起こっていたら、localで解消する。
1. 既存媒体にlvgs/laravelのアップデートを反映させる時
    1. （非推奨）patchファイルを作り、project側に適用する
        - 微々たる変化なら可能。既存媒体へのpatchによる変更はconflictが多数起こるので推奨しない。
    1. （推奨）アップデートの手順をREADMEに書いて対応する
        - 媒体側にも適応したいアップデートがある場合は、アップデートの手順をREADMEに書く。