# コンポーネントアーキテクチャガイドライン

本ドキュメントは、Modern WordPress Starter Kit におけるUIコンポーネントの設計指針を定義します。

## 設計思想

### Atomic Design

コンポーネントは **Atomic Design** の考え方に基づき、以下の5つのレイヤーに分類します。

| レイヤー | 説明 | 例 |
| :--- | :--- | :--- |
| **Atoms** | 最小単位のUI要素。それ以上分解できない。 | Button, Badge, Input, Icon |
| **Molecules** | 複数のAtomsを組み合わせた機能単位。 | Search Form, Card Header |
| **Organisms** | 独立したセクション。ページの一部として機能。 | Hero, Navigation, Footer, Card Grid |
| **Templates** | ページのワイヤーフレーム。コンテンツのない構造。 | Single Post Layout, Archive Layout |
| **Pages** | 具体的なコンテンツが入ったテンプレートのインスタンス。 | Home, About, Contact |

### ディレクトリ構成

```
parts/
├── atoms/           # 最小UI要素
│   ├── button.php
│   ├── badge.php
│   ├── input.php
│   └── ...
├── molecules/       # Atomsの組み合わせ
│   ├── search-form.php
│   ├── card-header.php
│   └── ...
├── organisms/       # 独立セクション
│   ├── hero-simple.php
│   ├── hero-split.php
│   ├── card.php
│   ├── cta.php
│   ├── features.php
│   └── ...
└── layouts/         # レイアウト定義
    ├── container.php
    └── grid.php
```

## コンポーネント実装規約

### 1. ファイル命名規則

- **ケバブケース**: `hero-simple.php`, `card-horizontal.php`
- **バリエーションはサフィックス**: `button.php` (デフォルト), `button-outline.php`, `button-ghost.php`

### 2. 引数の受け渡し

WordPress の `get_template_part()` 関数を使用し、`$args` 配列で引数を渡します。

```php
<?php
get_template_part('parts/atoms/button', null, [
    'text'    => 'お問い合わせ',
    'url'     => '/contact',
    'variant' => 'primary',  // primary, secondary, outline, ghost
    'size'    => 'md',       // sm, md, lg
]);
?>
```

### 3. デフォルト値の定義

すべてのコンポーネントは `wp_parse_args()` を使用してデフォルト値を定義します。

```php
<?php
$defaults = [
    'text'    => 'Button',
    'url'     => '#',
    'variant' => 'primary',
    'size'    => 'md',
];
$args = wp_parse_args( $args, $defaults );
?>
```

### 4. エスケープ処理

出力時は必ず適切なエスケープ関数を使用します。

| 用途 | 関数 |
| :--- | :--- |
| HTML内のテキスト | `esc_html()` |
| HTML属性値 | `esc_attr()` |
| URL | `esc_url()` |

### 5. Tailwind CSS クラスの管理

コンポーネント内でバリエーションに応じたクラスを動的に生成する場合は、配列を使用します。

```php
<?php
$variant_classes = [
    'primary'   => 'bg-blue-600 text-white hover:bg-blue-700',
    'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300',
    'outline'   => 'border border-blue-600 text-blue-600 hover:bg-blue-50',
];

$size_classes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
];

$classes = implode(' ', [
    'inline-flex items-center justify-center font-medium rounded-lg transition-colors',
    $variant_classes[ $args['variant'] ] ?? $variant_classes['primary'],
    $size_classes[ $args['size'] ] ?? $size_classes['md'],
]);
?>
```

## コンポーネントカタログ

### Atoms (原子)
- `button.php` - ボタン
- `badge.php` - バッジ/ラベル
- `input.php` - テキスト入力
- `textarea.php` - テキストエリア
- `icon.php` - アイコン (SVG)

### Molecules (分子)
- `search-form.php` - 検索フォーム
- `nav-link.php` - ナビゲーションリンク
- `card-header.php` - カードヘッダー部

### Organisms (生体)
- `hero-simple.php` - シンプルヒーロー
- `hero-split.php` - 画像分割ヒーロー
- `card.php` - コンテンツカード
- `cta.php` - Call to Action セクション
- `features.php` - 機能紹介グリッド
- `testimonials.php` - 顧客の声
- `faq.php` - FAQ アコーディオン
- `pricing.php` - 料金表

## 参考リンク

- [Atomic Design by Brad Frost](https://bradfrost.com/blog/post/atomic-web-design/)
- [Tailwind CSS](https://tailwindcss.com/)
- [WordPress Template Hierarchy](https://ja.wordpress.org/team/handbook/theme-development/basics/template-hierarchy/)
