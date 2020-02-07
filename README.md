# tool-ProjectCreator

## 概要
composer installをトリガーに、プロジェクトの雛形を生成します。

`key`の指定で、lvgs/laravelのうち、lvm関連の機能がついたlaravelと、ついていないlaravelを作り分けることができます。
- `laravel`：lvmなしのlvgs/laravel
- `laravel-with-lvm`：lvmありのlvgs/laravel

※このリポジトリの運用担当者は、[keyの追加の仕方](##keyの追加の仕方)を参照のこと。

## 環境
- Node.jsがインストールされていること
- Npmがインストールされていること
- Gitのバージョン2.9.0以上がインストールされていること

## 処理内容
composerのpost-install-cmdでsetup.shを呼び出し、下記処理を実行
- Gitのバージョンチェック
- Npmパッケージのインストール
- （実行者による、`key`の入力処理が入る）
- 入力された`key`に基づくリポジトリのclone
- cloneしたプロジェクトの既存の.gitを削除
- プロジェクト全体をgit initして初期化 & コミット
- tool-GitHooksのhooks設定の有効化
- セットアップに使用したシェルスクリプトを削除

## 開発時の注意
lvgs/tool-GitHooksのpre-commitを使用します。  
pre-commitで静的解析や画像圧縮でPHP、Npmのパッケージを使用しているため、  
PHP、Node.js、Npmがインストールされている環境でコミットを実行して下さい。

## 環境構築手順

### セットアップ担当者

1. プロジェクト名（新しく作成するリポジトリ名）を指定してリポジトリをクローン
```bash
$ git clone git@github.com:lvgs/tool-ProjectCreator.git <プロジェクト名>
```

2. セットアップ実行
```bash
$ composer install
```

3. githubのリポジトリにupload
```bash
$ # セットアップでgit initを行っているのでremoteリポジトリを追加
$ git remote add origin git@github.com:lvgs/<プロジェクト名>
$
$ # プロジェクト名、パッケージ名がprojectCreator用になってるので変更
$ # "name": "lvgs/project-example"→"lvgs/<プロジェクト名>"
$ vim composer.json
$ # composer.jsonをいじったまま、updateしてないとcomposerが怒るのでハッシュ値のみ更新
$ composer update --lock
$ cd laravel
$ vim composer.json
$ composer update --lock
$ # 'name' => 'Laravel'→<プロジェクト名>
$ vim config/app.php
$ # 開発環境で共通の.envファイル作成
$ cp .env.example .env
$ php artisan key:generate
$ vi .env
$ # git管理するために別名でコピーする
$ cp .env .env.local
$ 
$ # githubにアップロード
$ git add -u
$ git commit -m '[Mod]プロジェクト名<プロジェクト名>設定'
$ git fetch origin
$ # おそらくすでにgithubにリポジトリ自体は作成されているので
$ # このままだとgitの整合性が取れないのでオプションを付けてマージする
$ git merge --allow-unrelated-histories origin/master
$ # ※Readmeがあるとコンフリクトを起こすので修正してコミットする！
$ git push origin
```

4. laravelディレクトリ配下でPHPライブラリ、Npmパッケージをインストール
```bash
$ cd laravel
$ composer install
$ npm install

**WindowsユーザはVagrantの共有フォルダにsymbolic linkが貼ることができません**
**そのため、共有フォルダ内にクローンする場合は下記オプション付きで実行して下さい**
$ npm install --no-bin-links
```

5. composer.lockをコミットしてプッシュ
手順4で`composer install`を実行した際に、`laravel/composer.lock`が生成されるため、コミットしてリポジトリにプッシュして下さい
```bash
$ git add laravel/composer.lock
$ git commit
$ git push <リモート> <ブランチ>
```

### projectCreator開発メンバー
- リポジトリをクローン
```
$ git clone <対象リポジトリのURL>
```

- 静的解析、画像圧縮等に使用するPHPライブラリ、Npmパッケージをインストール
```
$ composer install
$ npm install

**WindowsユーザはVagrantの共有フォルダにsymbolic linkが貼ることができません**
**そのため、共有フォルダ内にクローンする場合は下記オプション付きで実行して下さい**
$ npm install --no-bin-links
```

- lvgs/tool-GitHooksの有効化
```
$ git config core.hookspath ./vendor/lvgs/tool-GitHooks/hooks
```

- laravelディレクトリ配下でPHPライブラリ、Npmパッケージをインストール
```
$ cd laravel
$ cp .env.local .env
$ composer install
$ npm install

**WindowsユーザはVagrantの共有フォルダにsymbolic linkが貼ることができません**
**そのため、共有フォルダ内にクローンする場合は下記オプション付きで実行して下さい**
$ npm install --no-bin-links
```

## keyの追加の仕方（運用担当者向け）
`config`ファイル内で、`key`とリポジトリが結びついています。

※ここでいう「リポジトリ」は、`git clone ...`の`...`に当たる部分を指します。なのでbranch指定をする場合などは、`git`コマンドの記法に従ってください。
```
# {{key}} = {{git clone に続く部分}}
laravel = git@github.com:lvgs/laravel.git
laravel-with-lvm = -b master-lvm git@github.com:lvgs/laravel.git
```