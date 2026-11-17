# Faker PHP — ro_RO locale

Romanian (`ro_RO`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-ro-ro
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('ro_RO');
```

Generators without a `ro_RO` variant fall back to the default locale.

## Extensions

This package provides `ro_RO` variants of the address, colors, company, financial, person, phone and text extensions.
On top of the standard generators, it adds:

| Method | Extension | Description |
| --- | --- | --- |
| `cnp(?string $gender = null)` | Person | Personal numeric code (CNP) with control digit |
| `cui()` | Company | Fiscal identification code (CUI / CIF) with control digit |
| `vat()` | Company | VAT number (`RO` + CUI) |
| `county()` | Address | County (județ) as `[code => name]`, e.g. `['CJ' => 'Cluj']` |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerRoRoServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
