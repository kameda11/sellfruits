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

erDiagram
  users ||--o{ posts : "1人のユーザーは0以上の投稿を持つ"
  users ||--o{ comments: "1人のユーザーは0以上のコメントを持つ"
  posts ||--o{ comments: "1つの投稿は0以上のコメントを持つ"

  users {
    bigint id PK
    string name "ユーザー名"
    timestamp created_at
    timestamp deleted_at
  }

  posts {
    bigint id PK
    references user FK
    string title "投稿タイトル"
    text content "投稿内容"
    timestamp created_at
    timestamp deleted_at
  }

  comments {
    bigint id PK
    references post FK
    references user FK
    text content "コメント内容"
    timestamp created_at
    timestamp deleted_at
  }


## その他

-   バージョン情報など、ネットで README.md の記述に必要なものを調べて載せること！
