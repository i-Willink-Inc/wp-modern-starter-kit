# Component Usage Guide

This guide explains how to use the UI components in this starter kit.

## Table of Contents

- [Overview](#overview)
- [Using Components](#using-components)
- [Atoms](#atoms)
- [Molecules](#molecules)
- [Organisms](#organisms)
- [Best Practices](#best-practices)

---

## Overview

Components are organized following **Atomic Design**:

| Level | Location | Description |
| :--- | :--- | :--- |
| Atoms | `parts/atoms/` | Basic UI elements (buttons, inputs, icons) |
| Molecules | `parts/molecules/` | Simple groups of atoms |
| Organisms | `parts/organisms/` | Complex UI sections |

---

## Using Components

All components are rendered using WordPress's `get_template_part()` function with an `$args` array:

```php
<?php get_template_part('parts/atoms/button', null, [
    'text'    => 'Click Me',
    'url'     => '/contact',
    'variant' => 'primary',
    'size'    => 'lg',
]); ?>
```

---

## Atoms

### Button

**File:** `parts/atoms/button.php`

| Argument | Type | Default | Options |
| :--- | :--- | :--- | :--- |
| `text` | string | `'Button'` | - |
| `url` | string | `'#'` | - |
| `variant` | string | `'primary'` | `primary`, `secondary`, `outline`, `ghost` |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

```php
<?php get_template_part('parts/atoms/button', null, [
    'text'    => 'Get Started',
    'url'     => '/signup',
    'variant' => 'primary',
    'size'    => 'lg',
]); ?>
```

### Badge

**File:** `parts/atoms/badge.php`

| Argument | Type | Default | Options |
| :--- | :--- | :--- | :--- |
| `text` | string | `'Badge'` | - |
| `color` | string | `'gray'` | `gray`, `red`, `green`, `blue`, `indigo`, etc. |
| `size` | string | `'md'` | `sm`, `md`, `lg` |
| `rounded` | string | `'full'` | `full`, `md`, `lg` |

### Icon

**File:** `parts/atoms/icon.php`

| Argument | Type | Default | Options |
| :--- | :--- | :--- | :--- |
| `name` | string | `'check'` | `check`, `close`, `menu`, `user`, `search`, `arrow-right`, `spinner` |
| `size` | string | `'md'` | `sm`, `md`, `lg`, `xl` |

### Input

**File:** `parts/atoms/input.php`

| Argument | Type | Default |
| :--- | :--- | :--- |
| `name` | string | Required |
| `label` | string | `''` |
| `placeholder` | string | `''` |
| `required` | bool | `false` |
| `error` | string | `''` |

### Alert

**File:** `parts/atoms/alert.php`

| Argument | Type | Default | Options |
| :--- | :--- | :--- | :--- |
| `type` | string | `'info'` | `info`, `success`, `warning`, `error` |
| `title` | string | `''` | - |
| `message` | string | `''` | - |

---

## Molecules

### Search Form

**File:** `parts/molecules/search-form.php`

A complete search form using Input and Button atoms.

| Argument | Type | Default |
| :--- | :--- | :--- |
| `placeholder` | string | `'Search...'` |
| `button_text` | string | `'Search'` |
| `action` | string | `home_url('/')` |

```php
<?php get_template_part('parts/molecules/search-form', null, [
    'placeholder' => 'Search articles...',
]); ?>
```

### Card Header

**File:** `parts/molecules/card-header.php`

| Argument | Type | Default |
| :--- | :--- | :--- |
| `title` | string | Required |
| `subtitle` | string | `''` |
| `badge` | string | `''` |
| `action_text` | string | `''` |
| `action_url` | string | `''` |

---

## Organisms

### Card

**File:** `parts/organisms/card.php`

| Argument | Type | Default |
| :--- | :--- | :--- |
| `title` | string | Required |
| `description` | string | `''` |
| `image_url` | string | `''` |
| `url` | string | `''` |
| `badge` | string | `''` |
| `badge_color` | string | `'blue'` |

```php
<?php get_template_part('parts/organisms/card', null, [
    'title'       => 'Blog Post Title',
    'description' => get_the_excerpt(),
    'image_url'   => get_the_post_thumbnail_url(),
    'url'         => get_permalink(),
    'badge'       => 'New',
]); ?>
```

### CTA (Call to Action)

**File:** `parts/organisms/cta.php`

| Argument | Type | Default | Options |
| :--- | :--- | :--- | :--- |
| `title` | string | Required | - |
| `description` | string | `''` | - |
| `button_text` | string | `'Get Started'` | - |
| `button_url` | string | `'#'` | - |
| `variant` | string | `'default'` | `default`, `dark` |

### Testimonials

**File:** `parts/organisms/testimonials.php`

| Argument | Type | Description |
| :--- | :--- | :--- |
| `title` | string | Section title |
| `items` | array | Array of testimonial objects |

Each item in `items`:
```php
[
    'content'    => 'Quote text...',
    'author'     => 'John Doe',
    'role'       => 'CEO, Company',
    'avatar_url' => 'https://...',
]
```

### Pricing

**File:** `parts/organisms/pricing.php`

| Argument | Type | Description |
| :--- | :--- | :--- |
| `title` | string | Section title |
| `plans` | array | Array of plan objects |

Each plan:
```php
[
    'name'        => 'Pro',
    'price'       => '$99',
    'period'      => 'month',
    'description' => 'For teams',
    'features'    => ['Feature 1', 'Feature 2'],
    'featured'    => true,  // Highlights this plan
    'button_text' => 'Get Pro',
    'button_url'  => '/checkout',
]
```

### FAQ

**File:** `parts/organisms/faq.php`

| Argument | Type | Description |
| :--- | :--- | :--- |
| `title` | string | Section title |
| `items` | array | Array of Q&A objects |

Each item:
```php
[
    'question' => 'How do I get started?',
    'answer'   => 'Follow the instructions in the README...',
]
```

---

## Best Practices

1. **Always use `$args` array** for passing data to components
2. **Escape all output** using WordPress escaping functions
3. **Use semantic defaults** - components should render correctly with minimal arguments
4. **Keep components focused** - each component should do one thing well
5. **Document new components** in this file when adding them
