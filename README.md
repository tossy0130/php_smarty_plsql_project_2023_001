# PHP Smarty PLSQL Project 2023 001

## 日本語

### 概要

このリポジトリは、PHP、Smarty、SQL / PL/SQL を使った Web アプリケーション開発の学習・検証用プロジェクトです。

主に、PHP による画面処理、Smarty テンプレートによる表示分離、SQL / PL/SQL によるデータベース処理、TCPDF による PDF 出力などを確認するためのサンプルとして整理しています。

過去に作成した PHP 系プロジェクトの学習メモ・検証コードをまとめたリポジトリです。

---

### 主な内容

- PHP による Web アプリケーション構成
- Smarty テンプレートを使った画面表示
- SQL / PL/SQL の学習・検証
- データベース操作用のクラス構成
- public_html 配下の公開用 PHP ファイル構成
- TCPDF を使った PDF 出力
- Composer による PHP ライブラリ管理
- PHP + DB + テンプレートエンジンの基本構成確認

---

### ディレクトリ構成

```text
php_smarty_plsql_project_2023_001/
├── Temp_PHP/
├── class/
├── plsql_tossy/
├── public_html/
├── sql/
├── tcpdf/
├── templates/
├── templates_c/
├── vendor/
├── composer.json
├── composer.lock
└── public_html7_2023-11-01_user_info.pdf
```

---

### 各フォルダの説明

#### Temp_PHP/

PHP の一時的な検証コードや、動作確認用のサンプルを置くためのフォルダです。

小さな処理を試したり、メイン実装に入れる前の実験コードを管理する用途を想定しています。

---

#### class/

PHP のクラスファイルを管理するフォルダです。

DB接続、共通処理、画面処理、ビジネスロジックなどをクラスとして分離するための構成を想定しています。

---

#### plsql_tossy/

PL/SQL の学習・検証用コードをまとめるフォルダです。

ストアドプロシージャ、関数、SQL処理、Oracle DB 周辺の処理確認などに利用する想定です。

---

#### public_html/

Webサーバーで公開する PHP ファイルを配置するフォルダです。

ブラウザからアクセスされる画面処理やエントリーポイントを置く構成を想定しています。

---

#### sql/

SQLファイルを管理するフォルダです。

テーブル作成、データ登録、検索、更新、削除、検証用SQLなどを整理する用途を想定しています。

---

#### tcpdf/

TCPDF 関連のファイルを管理するフォルダです。

PHP から PDF を生成する処理の学習・検証に使用します。

---

#### templates/

Smarty のテンプレートファイルを管理するフォルダです。

PHP側の処理とHTML表示を分離し、画面レイアウトや表示部品を管理するために使用します。

---

#### templates_c/

Smarty によって生成されるコンパイル済みテンプレート用のフォルダです。

通常、このフォルダの中身は実行時に生成されるため、Git管理から除外することがあります。

---

#### vendor/

Composer によってインストールされる外部ライブラリ用のフォルダです。

通常は `composer install` で再生成できるため、Git管理から除外することがあります。

---

### 使用技術

- PHP
- Smarty
- SQL
- PL/SQL
- TCPDF
- Composer
- HTML
- Web サーバー環境
- Oracle Database または SQL 対応データベース

---

### 想定用途

このリポジトリは、以下のような用途を想定しています。

- PHP の基本的な Web アプリ構成の学習
- Smarty によるテンプレート分離の学習
- SQL / PL/SQL の学習メモ整理
- PHP から DB を操作する処理の確認
- PHP で PDF を出力する処理の確認
- レガシーPHP構成の理解
- 過去プロジェクトの技術整理

---

### セットアップ例

Composer が利用できる環境で、必要なライブラリをインストールします。

```bash
composer install
```

Webサーバーの公開ディレクトリとして `public_html/` を参照するように設定します。

例：

```text
DocumentRoot /path/to/php_smarty_plsql_project_2023_001/public_html
```

Smarty を利用する場合は、`templates/` と `templates_c/` のパス設定、書き込み権限を確認してください。

---

### 注意点

このリポジトリは学習・検証用です。

本番環境で利用する場合は、以下を必ず確認してください。

- DB接続情報をコードに直接書かない
- ID、パスワード、APIキーなどの機密情報を公開しない
- `vendor/` を Git 管理するかどうかを整理する
- `templates_c/` の中身は基本的に Git 管理しない
- SQLインジェクション対策を行う
- 入力値バリデーションを行う
- エラー表示設定を本番向けに変更する
- PDF内に個人情報が含まれていないか確認する

---

### .gitignore 推奨例

必要に応じて、以下のような `.gitignore` を追加します。

```gitignore
# Composer dependencies
/vendor/

# Smarty compiled templates
/templates_c/*
!/templates_c/.gitkeep

# Logs
*.log
logs/

# Environment files
.env
.env.*
!.env.example

# OS / Editor
.DS_Store
.vscode/
.idea/

# Temporary files
*.tmp
*.bak
Temp_PHP/tmp/
```

既に `vendor/` や `templates_c/` を Git に含めている場合は、後から除外する前に、プロジェクトの再現性に問題がないか確認してください。

---

### 今後の改善案

- 各フォルダの役割をさらに詳細化
- DB接続設定のサンプル `.env.example` を追加
- Composer の利用手順を整理
- Smarty の設定手順を追加
- public_html からの起動手順を追加
- SQL / PL/SQL の実行手順を追加
- PDF出力処理の説明を追加
- 画面スクリーンショットを追加
- セキュリティ注意点を整理
- `vendor/` と `templates_c/` の Git 管理方針を整理

---

## English

### Overview

This repository is a learning and experimental project for building web applications with PHP, Smarty, and SQL / PL/SQL.

It is intended to organize sample code for PHP-based page processing, view separation with Smarty templates, database operations with SQL / PL/SQL, and PDF generation using TCPDF.

This repository mainly serves as a collection of notes and sample code from a PHP-based development project.

---

### Main Contents

- PHP web application structure
- Page rendering with Smarty templates
- SQL / PL/SQL learning and experiments
- Class-based structure for database and common logic
- Public PHP files under `public_html`
- PDF generation with TCPDF
- PHP library management with Composer
- Basic structure of PHP + database + template engine applications

---

### Directory Structure

```text
php_smarty_plsql_project_2023_001/
├── Temp_PHP/
├── class/
├── plsql_tossy/
├── public_html/
├── sql/
├── tcpdf/
├── templates/
├── templates_c/
├── vendor/
├── composer.json
├── composer.lock
└── public_html7_2023-11-01_user_info.pdf
```

---

### Folder Description

#### Temp_PHP/

This folder contains temporary PHP test scripts and small experimental code.

It can be used to test small features before moving them into the main implementation.

---

#### class/

This folder contains PHP class files.

It is intended for separating database access, common logic, page processing, and business logic into reusable classes.

---

#### plsql_tossy/

This folder contains PL/SQL learning and experimental code.

It can be used for stored procedures, functions, SQL processing, and Oracle database related experiments.

---

#### public_html/

This folder contains PHP files intended to be served by a web server.

It is expected to include browser-accessible page scripts and application entry points.

---

#### sql/

This folder contains SQL files.

It can be used for table creation, data insertion, search queries, updates, deletes, and test SQL scripts.

---

#### tcpdf/

This folder contains files related to TCPDF.

It is used for learning and testing PDF generation from PHP.

---

#### templates/

This folder contains Smarty template files.

It is used to separate PHP logic from HTML presentation and manage page layouts and view components.

---

#### templates_c/

This folder is used for compiled Smarty templates.

In many projects, the contents of this folder are generated at runtime and are not committed to Git.

---

#### vendor/

This folder contains external libraries installed by Composer.

In many projects, this folder can be regenerated with `composer install` and is not committed to Git.

---

### Technologies Used

- PHP
- Smarty
- SQL
- PL/SQL
- TCPDF
- Composer
- HTML
- Web server environment
- Oracle Database or SQL-compatible database

---

### Use Cases

This repository can be used for:

- Learning basic PHP web application structure
- Learning template separation with Smarty
- Organizing SQL / PL/SQL study notes
- Testing database operations from PHP
- Testing PDF output from PHP
- Understanding legacy PHP application structure
- Organizing past project knowledge

---

### Setup Example

Install dependencies with Composer.

```bash
composer install
```

Configure your web server to use `public_html/` as the public document root.

Example:

```text
DocumentRoot /path/to/php_smarty_plsql_project_2023_001/public_html
```

When using Smarty, check the path settings and write permissions for `templates/` and `templates_c/`.

---

### Notes

This repository is for learning and experimentation.

Before using it in a production environment, make sure to check the following:

- Do not hard-code database credentials
- Do not publish IDs, passwords, API keys, or credentials
- Decide whether `vendor/` should be committed or ignored
- Usually, compiled files under `templates_c/` should not be committed
- Prevent SQL injection
- Validate user inputs
- Configure error display settings for production
- Check whether generated PDF files contain personal information

---

### Recommended .gitignore Example

Add a `.gitignore` like the following if needed.

```gitignore
# Composer dependencies
/vendor/

# Smarty compiled templates
/templates_c/*
!/templates_c/.gitkeep

# Logs
*.log
logs/

# Environment files
.env
.env.*
!.env.example

# OS / Editor
.DS_Store
.vscode/
.idea/

# Temporary files
*.tmp
*.bak
Temp_PHP/tmp/
```

If `vendor/` or `templates_c/` is already committed, check whether the project can still be reproduced before removing them from Git.

---

### Future Improvements

- Add more detailed explanations for each folder
- Add a sample `.env.example` for database configuration
- Organize Composer setup instructions
- Add Smarty setup instructions
- Add instructions for running from `public_html`
- Add SQL / PL/SQL execution instructions
- Add explanation for PDF generation
- Add screenshots
- Organize security notes
- Decide the Git management policy for `vendor/` and `templates_c`
