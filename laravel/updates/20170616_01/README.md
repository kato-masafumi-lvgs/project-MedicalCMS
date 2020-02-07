# 更新内容
1. app/GlobalScopesディレクトリをapp/Scopesに変更します。

# 変更反映方法
1. パッチをダウンロードします。
2. パッチを適用します。

    ```
    # パッチ適用時にコミットを行いたい場合（コミットメッセージも引き継ぎます）
    $ git am --directory=laravel updates/20160601_01/default.patch
    # パッチ適用時にコミットを行いたくない場合
    $ git apply --check --stat --directory=laravel updates/20160601_01/default.patch
    $ git apply --index updates/20160601_01/default.patch
    $ git commit
    ```

3. GlobalScopesディレクトリにファイルが存在する場合は、追加で手動でScopesディレクトリに変更して更新してください。
