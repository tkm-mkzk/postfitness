# PostFit

![スクリーンショット 2021-03-31 19 30 08](https://user-images.githubusercontent.com/71067058/113130957-91271600-9257-11eb-87e6-653d89b897cd.png)

## アプリケーション概要

行ったトレーニングを投稿したり、体重を記録していくことができるアプリです。

## URL

www.postfit.xyz (トップページ右上のゲストログインボタンからゲストログインできます)

## 制作背景

より多くの人のトレーニングの手助けになれればと思いこのアプリを開発しました。

- どのくらいの頻度でどの部位をトレーニングしているのか覚えていない。
- 筋トレやジムに行くモチベーションを上げたい。

上記のことは私が思っていたことなのですが、トレーニングを行っている人なら一度は考えたことがあるのではないでしょうか。このアプリは上記のことを全て解決します。また、

- ジムを契約したけど続かずに辞めてしまった。
- 最近太ってきたけど気にせずに食べ過ぎてしまう。

このような話もよく耳にします。トレーニングを記録することは継続を確認することができ、それがモチベーションの向上につながります。

## 機能一覧

### ユーザー機能

- ユーザーの新規登録、ログイン
- ゲストログイン
- メールを使ったパスワード再設定機能
- Googleアカウントでの新規登録、ログイン
- ユーザーフォロー機能
- マイページでのフォロー、フォロワー、自分の投稿、いいねした投稿の表示

### トレーニングブログ投稿機能

- ブログの投稿、編集、削除
- 投稿一覧表示

<img width="729" alt="スクリーンショット 2021-04-01 16 58 46" src="https://user-images.githubusercontent.com/71067058/113262410-8928ae00-930b-11eb-96c9-ba713db71aee.png">

- ページネーション機能
- 投稿検索

![eb83473c4f430985d29a5a8ffff31246](https://user-images.githubusercontent.com/71067058/113263226-7a8ec680-930c-11eb-80ea-897e5c510722.gif)

- タグ付け機能（タグ検索）

![c66e12bc17f29f96863347ae2b3651ab](https://user-images.githubusercontent.com/71067058/113263511-d3f6f580-930c-11eb-986a-fb2989b9db87.gif)

- いいね機能

<img width="785" alt="スクリーンショット 2021-04-01 17 09 48" src="https://user-images.githubusercontent.com/71067058/113263757-2506e980-930d-11eb-827a-7f0d3d9f9127.png">

![e8983fd107708a730d353103bf0ee8ee](https://user-images.githubusercontent.com/71067058/113264171-a0689b00-930d-11eb-8d41-02e292051413.gif)

### 体重記録機能

- 体重の記録、編集、削除


![866401c3b7fb40640900b4912191ba85](https://user-images.githubusercontent.com/71067058/113264862-6b107d00-930e-11eb-92cf-9cb3e0a2550b.gif)

### その他

- レスポンシブデザイン

## 使用技術

- HTML / CSS
- Bootstrap4
- PHP 8.0.1
- Laravel 8.28.1
- vue 2.6.11"
- MySQL
- docker
- AWS(EC2)
- MailHog
- SendGrid

## データベース設計

### users テーブル

| Column             | Type    | Options                    |
| ------------------ | ------- | -------------------------- |
| id                 |         |                            |
| name               | string  |                            |
| email              | string  | unique                     |
| email_verified_at  |         | nullable                   |
| password           | string  |                            |
| remember_token     |         |                            |
| created_at         |         |                            |
| updated_at         |         |                            |

#### リレーション

- hasMany :blogs

### blogs テーブル

| Column               | Type               | Options           |
| -------------------- | ------------------ | ----------------- |
| id                   |                    |                   |
| title                | string             | 50                |
| content              | text               |                   |
| user_id              | unsignedBigInteger |                   |
| created_at           |                    |                   |
| updated_at           |                    |                   |

#### リレーション

- belongsTo :user
- belongsToMany :tags

### likes テーブル

| Column               | Type               | Options           |
| -------------------- | ------------------ | ----------------- |
| id                   |                    |                   |
| user_id              | unsignedBigInteger |                   |
| blog_id              | unsignedBigInteger |                   |
| created_at           |                    |                   |
| updated_at           |                    |                   |

#### リレーション

- users,blogsの中間テーブル

### tags テーブル

| Column               | Type               | Options           |
| -------------------- | ------------------ | ----------------- |
| id                   |                    |                   |
| name                 | string             | unique            |
| created_at           |                    |                   |
| updated_at           |                    |                   |

#### リレーション

- belongsToMany :blogs

### blog_tag テーブル

| Column               | Type               | Options           |
| -------------------- | ------------------ | ----------------- |
| id                   |                    |                   |
| tag_id               | unsignedBigInteger |                   |
| blog_id              | unsignedBigInteger |                   |
| created_at           |                    |                   |
| updated_at           |                    |                   |

#### リレーション

- tags,blogsテーブルの中間テーブル
