# Modern WordPress Starter Kit

PHPベースのWordPressテーマ開発を爆速化するスターターキットです。
Tailwind CSS によるモダンなスタイリング、事前構築済みの UI コンポーネント群、そして GitHub Actions による自動ビルド・デプロイフローを備え、受託開発における立ち上げから納品までのリードタイムを劇的に短縮します。

## 📋 目次

- [特徴](#-特徴)
- [プロジェクト構成](#-プロジェクト構成)
- [クイックスタート](#-クイックスタート)
- [開発ガイド](#-開発ガイド)
- [ビルドと納品](#-ビルドと納品)
- [利用可能なコマンド](#-利用可能なコマンド)
- [コントリビューション](#-コントリビューション)
- [ライセンス](#-ライセンス)

## ✨ 特徴

*   **🎨 Tailwind CSS**
    *   ユーティリティファーストなスタイリングと `template-parts` によるコンポーネント化
*   **🧩 Pre-built UI**
    *   Hero, Cards, CTA など、即戦力の UI コンポーネントを多数同梱
*   **🐘 Pure PHP**
    *   フロントエンドフレームワークに依存せず、PHP だけで完結する堅牢な構成
*   **📦 Auto Release**
    *   GitHub Actions で納品用 ZIP ファイルを自動生成
*   **⚡ Modern DX**
    *   `wp-env` によるゼロコンフィグなローカル開発環境とホットリロード
*   **🧹 Code Quality**
    *   PHPCS (WordPress Coding Standards) + Prettier による品質担保

## 📁 プロジェクト構成

```
wp-modern-starter-kit/
├── src/                     # 開発用ソースコード (ビルド対象)
│   ├── css/                 # Tailwind CSS / SCSS
│   └── js/                  # TypeScript / JavaScript
├── parts/                   # 再利用可能なテンプレートパーツ
│   ├── components/          # ★ UIコンポーネント集 (Hero, Card等)
│   ├── common/              # ヘッダー、フッター等
│   └── layouts/             # レイアウト定義
├── inc/                     # PHPロジック (functions.phpから分割)
├── templates/               # 個別ページテンプレート
├── functions.php            # テーマのエントリーポイント
├── style.css                # テーマ定義ファイル
└── .github/workflows/       # CI/CD (Lint, Release作成)
```

## 🚀 クイックスタート

### 前提条件

| ツール | 最小バージョン | 推奨 |
| :--- | :--- | :--- |
| **Node.js** | 18.17.0 | 20.x LTS |
| **Docker** | - | 最新版（wp-env利用時に必須） |

### 1. リポジトリのクローン

```bash
git clone https://github.com/i-Willink-Inc/wp-modern-starter-kit.git my-theme
cd my-theme
```

### 2. 依存関係のインストール

```bash
npm install
```

### 3. ローカル環境の起動 (wp-env)

Docker を使用してローカルに WordPress 環境を立ち上げます。
**Docker Desktop** もしくは **OrbStack** がインストールされ、起動している必要があります。

```bash
npm run env:start
```

> [!NOTE]
> 初回起動時はWordPress本体やデータベースイメージのダウンロードが行われるため、数分かかる場合があります。

*   **サイト URL**: http://localhost:8888
*   **管理画面**: http://localhost:8888/wp-admin
    *   User: `admin`
    *   Password: `password`

### 4. 開発サーバーの起動

ファイルの変更を監視し、自動ビルドとホットリロードを行います。

```bash
npm run dev
```

## 🛠 開発ガイド

### コンポーネントの利用

このキットには `parts/components/` 配下に汎用的な UI コンポーネントが含まれています。
PHP の `get_template_part` 関数を使用して、引数を渡しながら簡単に呼び出すことができます。

**使用例: ヒーローセクションの表示**

```php
<?php
get_template_part('parts/components/hero-simple', null, [
    'title'       => '株式会社サンプル',
    'description' => '最新の技術でビジネスを加速させます。',
    'button_text' => 'お問い合わせ',
    'button_url'  => '/contact',
    'image_url'   => 'https://example.com/hero.jpg'
]);
?>
```

### スタイリング

`src/css/style.css` を編集します。Tailwind CSS のユーティリティクラスを使用するか、必要に応じて `@apply` ディレクティブを使用してカスタムクラスを定義してください。

## 📦 ビルドと納品

### 本番用ビルド

CSS/JS の最適化（Minify）を行います。

```bash
npm run build
```

### テーマファイルのパッケージング (手動)

納品用に不要なファイル（node_modules, src 等）を除外し、テーマ一式を ZIP ファイルに圧縮します。

```bash
npm run zip
```
`dist/wp-modern-starter-kit.zip` が生成されます。

### 自動リリース (GitHub Actions)

Git タグをプッシュすると、自動的にビルドと ZIP 作成が行われ、GitHub Releases にアップロードされます。

```bash
git tag v1.0.0
git push origin v1.0.0
```

## 📋 利用可能なコマンド

| コマンド | 説明 |
| :--- | :--- |
| `npm run dev` | 開発モード起動 (Watch + Hot Reload) |
| `npm run build` | プロダクションビルド |
| `npm run env:start` | ローカル WordPress 起動 |
| `npm run env:stop` | ローカル WordPress 停止 |
| `npm run lint` | コード品質チェック (PHP/JS/CSS) |
| `npm run format` | コード自動フォーマット |
| `npm run zip` | 納品用 ZIP ファイル生成 |

## 🤝 コントリビューション

コントリビューションを歓迎します！詳細は `CONTRIBUTING.md` をご覧ください。

## 📄 ライセンス

このプロジェクトは MIT License の下で公開されています。
