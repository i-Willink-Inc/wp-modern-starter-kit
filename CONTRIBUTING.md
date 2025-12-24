# Contributing to WP Modern Starter Kit

Thank you for your interest in contributing to this project! This document provides guidelines and instructions for contributing.

## Table of Contents

- [Development Environment Setup](#development-environment-setup)
- [Code Style Guidelines](#code-style-guidelines)
- [Git Workflow](#git-workflow)
- [Pull Request Process](#pull-request-process)

---

## Development Environment Setup

### Prerequisites

- **Node.js** >= 18.0.0
- **npm** >= 8.0.0
- **Docker** (for wp-env)

### Getting Started

1. **Clone the repository**
   ```bash
   git clone https://github.com/i-Willink-Inc/wp-modern-starter-kit.git
   cd wp-modern-starter-kit
   ```

2. **Install dependencies**
   ```bash
   npm install
   ```

3. **Start the development environment**
   ```bash
   npm run start
   ```
   This will:
   - Start the WordPress Docker environment at `http://localhost:8888`
   - Watch for CSS changes and rebuild Tailwind

4. **Access WordPress Admin**
   - URL: `http://localhost:8888/wp-admin`
   - Username: `admin`
   - Password: `password`

### Useful Commands

| Command | Description |
| :--- | :--- |
| `npm run start` | Start dev environment (wp-env + CSS watch) |
| `npm run build` | Build production CSS |
| `npm run lint` | Run all linters |
| `npm run env:stop` | Stop Docker containers |
| `npm run env:destroy` | Remove Docker containers and data |

---

## Code Style Guidelines

### Atomic Design

This project follows the **Atomic Design** methodology for UI components:

```
parts/
├── atoms/       # Basic building blocks (Button, Input, Icon)
├── molecules/   # Simple component groups (Search Form, Card Header)
├── organisms/   # Complex UI sections (Card, CTA, Pricing)
└── layouts/     # Page layouts (future)
```

For detailed component architecture, see [`docs/architecture.md`](docs/architecture.md).

### PHP

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Use `wp_parse_args()` for component arguments
- Always escape output with `esc_html()`, `esc_attr()`, `esc_url()`

### CSS / Tailwind

- Use Tailwind utility classes whenever possible
- Custom CSS goes in `src/css/`
- Avoid inline styles

### JavaScript

- ES6+ syntax
- Follow WordPress JS coding standards

---

## Git Workflow

### Branch Naming

- `feature/short-description` - New features
- `fix/short-description` - Bug fixes
- `docs/short-description` - Documentation changes
- `refactor/short-description` - Code refactoring

### Conventional Commits

This project uses [Conventional Commits](https://www.conventionalcommits.org/). Examples:

```
feat: add testimonials component
fix: resolve button hover state issue
docs: update README with new commands
refactor: simplify card component logic
chore: update dependencies
```

---

## Pull Request Process

1. **Create a feature branch** from `main`
2. **Make your changes** following the code style guidelines
3. **Test locally** using the development environment
4. **Commit** using Conventional Commits format
5. **Push** your branch and create a Pull Request
6. **Request review** from maintainers
7. **Address feedback** if any
8. **Merge** once approved

### PR Checklist

- [ ] Code follows the project's style guidelines
- [ ] Self-reviewed my own code
- [ ] Added/updated documentation if needed
- [ ] Tested in the local wp-env environment
- [ ] No linting errors (`npm run lint`)

---

## Questions?

If you have any questions, please open an issue or contact the maintainers.

Thank you for contributing! 🎉
