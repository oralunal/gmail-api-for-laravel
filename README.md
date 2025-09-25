# Gmail API For Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oralunal/gmail-api-for-laravel.svg?style=flat-square)](https://packagist.org/packages/oralunal/gmail-api-for-laravel)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oralunal/gmail-api-for-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oralunal/gmail-api-for-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oralunal/gmail-api-for-laravel.svg?style=flat-square)](https://packagist.org/packages/oralunal/gmail-api-for-laravel)

A Laravel package that allows you to use Gmail API as a mail driver.

## Features

- Use Gmail API instead of SMTP
- Using OAuth 2.0 for server to server applications
- Full Laravel mail system integration
- Laravel 12.x support
- Auto-discovery (no manual registration needed)

## Support us

Your support is not required or expected, but we would appreciate it. 

## Installation

You can install the package via composer:

```bash
composer require oralunal/gmail-api-for-laravel
```

This is the contents of the published config file:

```php
return [
    'credentials_json_full_path' => env('GMAIL_API_CREDENTIALS_JSON_FULL_PATH', false),
];
```

You should update the `credentials_json_full_path` value in your `.env` file.

```
GMAIL_API_CREDENTIALS_JSON_FULL_PATH=/full/path/to/credentials.json
```

## Usage

Update `MAIL_MAILER` and `MAIL_FROM_ADDRESS` in your `.env` file.

```
MAIL_MAILER=gmail-api
MAIL_FROM_ADDRESS=you@domain.com
```

## Credits

- [Oral Ünal](https://github.com/oralunal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
