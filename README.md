# sellfruits

## 環境構築手順

-   コンテナを立ち上げるため、以下を実行

```
docker compose up -d --build
```

-   env ファイルの作成をするため、以下を実行

```
cp src/.env.example src/.env
```

-   php にコンテナに入るため、以下を実行

```
docker compose exec php bash
```

-   composer パッケージをインストールするため、以下を実行

```
composer install
```

-   アプリケーションキーを作成するため、以下を実行

```
php artisan key:generate
```

-   マイグレーションを実行するため、以下を実行

```
php artisan migrate
```

-   シンボリックリンクの作成をするため、以下を実行

```
php artisan storage:link
```

## ER 図

```mermaid　
erDiagram
  users ||--o{ goods

  users {
    PK "顧客ID"
    "顧客名"
    "メールアドレス"
    "電話番号"
    
  }

  goods {
    PK "商品ID"
    "顧客ID"
    "商品ID"
    "商品個数"
  }


## その他

-   バージョン情報など、ネットで README.md の記述に必要なものを調べて載せること！
