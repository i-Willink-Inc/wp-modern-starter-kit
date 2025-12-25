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

### Navbar

**File:** `parts/organisms/navbar.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `logo` | string | `''` | Logo HTML or text |
| `logo_url` | string | `home_url('/')` | Logo link URL |
| `menu_items` | array | `[]` | Navigation items |
| `cta` | array | `[]` | CTA button `['text' => '', 'url' => '']` |
| `variant` | string | `'light'` | `light`, `dark`, `transparent` |
| `sticky` | bool | `false` | Sticky header |

### Footer

**File:** `parts/organisms/footer.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `logo` | string | `''` | Footer logo |
| `description` | string | `''` | Company description |
| `columns` | array | `[]` | Link columns |
| `social` | array | `[]` | Social links |
| `copyright` | string | Auto-generated | Copyright text |
| `variant` | string | `'light'` | `light`, `dark` |

### Modal

**File:** `parts/organisms/modal.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `id` | string | Auto-generated | Modal ID |
| `title` | string | `''` | Modal title |
| `content` | string | `''` | Body content (HTML) |
| `footer` | string | `''` | Footer content (buttons) |
| `size` | string | `'md'` | `sm`, `md`, `lg`, `xl`, `full` |
| `closable` | bool | `true` | Show close button |

Use with JavaScript:
```javascript
openModal('modal-id');
closeModal('modal-id');
```

### Timeline

**File:** `parts/organisms/timeline.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `items` | array | `[]` | Timeline items |
| `variant` | string | `'default'` | `default`, `alternating` |

Each item:
```php
[
    'date'        => '2024年1月',
    'title'       => 'Event Title',
    'description' => 'Event description...',
    'color'       => 'blue', // blue, green, red, yellow, purple
    'icon'        => '<svg>...</svg>', // Optional
]
```

### Contact Form

**File:** `parts/organisms/contact-form.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | string | `'お問い合わせ'` | Form title |
| `description` | string | `''` | Form description |
| `variant` | string | `'default'` | `default`, `card`, `split` |
| `show_name` | bool | `true` | Show name fields |
| `show_company` | bool | `false` | Show company field |
| `show_phone` | bool | `false` | Show phone field |
| `show_subject` | bool | `true` | Show subject field |

### Gallery

**File:** `parts/organisms/gallery.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | string | `''` | Gallery title |
| `images` | array | `[]` | Image items |
| `columns` | int | `3` | `2`, `3`, `4` |
| `lightbox` | bool | `true` | Enable lightbox |

Each image:
```php
[
    'url'     => 'https://...',
    'alt'     => 'Image description',
    'caption' => 'Optional caption',
]
```

### Team

**File:** `parts/organisms/team.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | string | `''` | Section title |
| `members` | array | `[]` | Team members |
| `columns` | int | `3` | `2`, `3`, `4` |
| `variant` | string | `'default'` | `default`, `card`, `centered` |

Each member:
```php
[
    'name'   => 'Name',
    'role'   => 'Position',
    'image'  => 'https://...',
    'bio'    => 'Short bio',
    'social' => [
        ['icon' => '<svg>...</svg>', 'url' => '#', 'label' => 'Twitter'],
    ],
]
```

---

## Molecules (New)

### Pagination

**File:** `parts/molecules/pagination.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `current_page` | int | `1` | Current page number |
| `total_pages` | int | `1` | Total pages |
| `size` | string | `'md'` | `sm`, `md`, `lg` |
| `show_first_last` | bool | `true` | Show first/last page links |

### Tabs

**File:** `parts/molecules/tabs.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `tabs` | array | `[]` | Tab items |
| `active` | int | `0` | Active tab index (0-based) |
| `variant` | string | `'underline'` | `underline`, `boxed`, `pills` |

Each tab:
```php
[
    'label'   => 'Tab Name',
    'content' => '<p>Tab content HTML</p>',
    'icon'    => '<svg>...</svg>', // Optional
]
```

### Stat

**File:** `parts/molecules/stat.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | string | `''` | Stat label |
| `value` | string | `''` | Main value |
| `trend` | string | `''` | `up`, `down`, `neutral` |
| `trend_value` | string | `''` | e.g., `'+12%'` |
| `description` | string | `''` | Additional text |
| `variant` | string | `'default'` | `default`, `bordered`, `colored` |
| `color` | string | `'blue'` | blue, green, red, yellow, purple |

### Steps

**File:** `parts/molecules/steps.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `steps` | array | `[]` | Step items |
| `current` | int | `0` | Current step index (0-based) |
| `orientation` | string | `'horizontal'` | `horizontal`, `vertical` |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

Each step:
```php
[
    'title'       => 'Step Name',
    'description' => 'Step description',
    'icon'        => '<svg>...</svg>', // Optional
]
```

### Dropdown

**File:** `parts/molecules/dropdown.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | string | `'メニュー'` | Button text |
| `items` | array | `[]` | Menu items |
| `position` | string | `'bottom-left'` | `bottom-left`, `bottom-right`, `top-left`, `top-right` |
| `variant` | string | `'default'` | `default`, `primary` |

Each item:
```php
[
    'label'   => 'Item Name',
    'url'     => '#',
    'icon'    => '<svg>...</svg>', // Optional
    'divider' => false,            // true for separator line
]
```

### Accordion

**File:** `parts/molecules/accordion.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `items` | array | `[]` | Accordion items |
| `allow_multiple` | bool | `false` | Allow multiple open panels |
| `variant` | string | `'default'` | `default`, `bordered`, `separated` |

Each item:
```php
[
    'title'   => 'Panel Title',
    'content' => 'Panel content HTML',
    'open'    => false, // Initially open
]
```

### Menu

**File:** `parts/molecules/menu.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `items` | array | `[]` | Menu items |
| `variant` | string | `'default'` | `default`, `compact`, `bordered` |

Each item:
```php
[
    'label'    => 'Menu Item',
    'url'      => '#',
    'icon'     => '<svg>...</svg>',
    'badge'    => '5',
    'active'   => false,
    'children' => [], // Nested items
]
```

### Form Group

**File:** `parts/molecules/form-group.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | string | `''` | Field label |
| `name` | string | `''` | Input name |
| `type` | string | `'text'` | `text`, `email`, `password`, `textarea`, `select`, `checkbox`, `radio` |
| `placeholder` | string | `''` | Placeholder text |
| `options` | array | `[]` | Options for select/radio |
| `required` | bool | `false` | Required field |
| `error` | string | `''` | Error message |
| `help` | string | `''` | Help text |

---

## Atoms (New)

### Checkbox

**File:** `parts/atoms/checkbox.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | string | `''` | Checkbox label |
| `name` | string | `''` | Input name |
| `checked` | bool | `false` | Initial state |
| `disabled` | bool | `false` | Disabled state |
| `required` | bool | `false` | Required field |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

### Radio

**File:** `parts/atoms/radio.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | string | `''` | Radio label |
| `name` | string | `''` | Group name |
| `value` | string | `''` | Radio value |
| `checked` | bool | `false` | Selected state |
| `disabled` | bool | `false` | Disabled state |

### Select

**File:** `parts/atoms/select.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | string | `''` | Select label |
| `name` | string | `''` | Input name |
| `options` | array | `[]` | `[['value' => '', 'label' => '']]` |
| `placeholder` | string | `''` | Placeholder option |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

### Toggle

**File:** `parts/atoms/toggle.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | string | `''` | Toggle label |
| `name` | string | `''` | Input name |
| `checked` | bool | `false` | Initial state |
| `disabled` | bool | `false` | Disabled state |
| `variant` | string | `'primary'` | `primary`, `success`, `warning` |
| `size` | string | `'md'` | `sm`, `md`, `lg` |

### Divider

**File:** `parts/atoms/divider.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `text` | string | `''` | Center text (e.g., "OR") |
| `orientation` | string | `'horizontal'` | `horizontal`, `vertical` |
| `variant` | string | `'solid'` | `solid`, `dashed`, `dotted` |
| `spacing` | string | `'md'` | `sm`, `md`, `lg` |

### Progress

**File:** `parts/atoms/progress.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | int | `0` | Current value (0-100) |
| `max` | int | `100` | Maximum value |
| `label` | string | `''` | Progress label |
| `show_value` | bool | `true` | Show percentage |
| `size` | string | `'md'` | `sm`, `md`, `lg` |
| `color` | string | `'blue'` | blue, green, red, yellow, purple |
| `variant` | string | `'default'` | `default`, `gradient`, `striped` |

### Rating

**File:** `parts/atoms/rating.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | float | `0` | Rating value (supports decimals like 3.5) |
| `max` | int | `5` | Maximum stars |
| `readonly` | bool | `true` | Read-only display |
| `size` | string | `'md'` | `sm`, `md`, `lg` |
| `color` | string | `'yellow'` | yellow, red, blue, green |

### Tooltip

**File:** `parts/atoms/tooltip.php`

| Argument | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `text` | string | `''` | Tooltip text |
| `content` | string | `''` | Trigger element (HTML) |
| `position` | string | `'top'` | `top`, `bottom`, `left`, `right` |
| `variant` | string | `'dark'` | `dark`, `light` |

```php
<?php get_template_part('parts/atoms/tooltip', null, [
    'text'    => 'This is helpful information',
    'content' => '<span class="underline">Hover me</span>',
]); ?>
```

---

## Best Practices

1. **Always use `$args` array** for passing data to components
2. **Escape all output** using WordPress escaping functions
3. **Use semantic defaults** - components should render correctly with minimal arguments
4. **Keep components focused** - each component should do one thing well
5. **Document new components** in this file when adding them

