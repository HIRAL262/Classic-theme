# Meridian

A clean, accessible, translation-ready classic WordPress theme built from scratch with plain CSS and no build step required.

## Features

- Classic (non-block/FSE) WordPress theme — works with the standard Customizer and the Widgets screen.
- No build tooling — plain, hand-written CSS in `style.css`, no npm install required.
- Primary + footer navigation menus, with an accessible mobile menu toggle.
- Sidebar widget area plus three footer widget areas.
- Custom logo, post thumbnails, HTML5 markup, threaded/nested comments.
- Translation-ready (`meridian` text domain, `/languages` directory).
- Follows WordPress Coding Standards structure (`inc/template-tags.php`, `inc/template-functions.php`, `inc/customizer.php`, `template-parts/`).

## Requirements

- WordPress 6.0+
- PHP 7.4+

## Installation

1. Copy (or clone) this folder into `wp-content/themes/meridian`.
2. In wp-admin, go to **Appearance → Themes** and activate **Meridian**.
3. Set up menus at **Appearance → Menus** (assign to "Primary Menu" and/or "Footer Menu").
4. Add widgets at **Appearance → Widgets** ("Sidebar", "Footer 1", "Footer 2", "Footer 3").
5. Optionally set a custom logo and footer text at **Appearance → Customize**.

## Development

There is no build step. Edit `style.css` and the `.php` template files directly; changes are picked up immediately.

Coding standards are enforced via `phpcs.xml.dist` (WordPress Coding Standards ruleset) and checked automatically in CI on every push/PR via `.github/workflows/lint.yml`, which also runs a PHP syntax lint (`php -l`) across all theme files.

To run PHPCS locally (requires Composer):

```bash
composer require --dev wp-coding-standards/wpcs squizlabs/php_codesniffer dealerdirect/phpcodesniffer-composer-installer
vendor/bin/phpcs --standard=phpcs.xml.dist .
```

## File structure

```
meridian/
├── style.css                  # Theme header + all styles
├── functions.php               # Theme setup, menus, widgets, enqueues
├── header.php / footer.php     # Global structure
├── sidebar.php                 # Sidebar widget area
├── index.php                   # Fallback/blog loop
├── single.php / page.php       # Single post / static page
├── archive.php / search.php    # Archive & search results
├── 404.php                     # Not found
├── comments.php / searchform.php
├── inc/
│   ├── template-tags.php       # meridian_posted_on(), entry_footer(), etc.
│   ├── template-functions.php  # body_class filter, excerpt tweaks
│   └── customizer.php          # Customizer settings
├── template-parts/
│   ├── content.php              content-single.php
│   ├── content-page.php         content-search.php
│   └── content-none.php
├── assets/js/
│   ├── navigation.js           # Mobile menu toggle
│   └── customizer.js           # Live Customizer preview
└── languages/                  # .pot/.po/.mo translation files
```

## License

GPLv2 or later. See [LICENSE](LICENSE). Based on [Underscores](https://underscores.me/) (C) 2012-2020 Automattic, Inc.
