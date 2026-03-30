# contact-form-2

![ER図](./docs/images/contact-form-2.drawio)

# contact-form-2　-Fashionably Late お問い合わせ管理システム-

##環境開発
-Dockerビルド
　git clone git@github.com:mii4573/contact-form-2.git
  cd contact-form-2
  docker-compose up -d --build
-Laravel環境構築
　docker-compose exec php bash
  comporser install
  cp. .env.example .env 環境変数適宜変更
  php artisan key:generate
  php artisan migrate
  php artisan db:seed

##使用技術（実行環境）
 php 8.1
 mysql 8.0.26
 nginx 1.21.1
 Laravel Framework 8.83.29

##開発環境
-phpMyAdmin:http://localhost:8080
-お問い合わせ画面：http://localhost

　
