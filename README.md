# [Kontur.Focus](https://developer.kontur.ru/doc/focus?about=0) API Client

[![Latest Stable Version][packagist-image]][packagist-url]
[![Total Downloads][downloads-image]][packagist-url]
[![License][license-image]][packagist-url]

## Installation

```sh
composer require asavenkov/kontur-focus
```

Requirements:

-   PHP 7.2.5+
-   Guzzle 6.3+

## Usage

Create API client instance:

```php
$token = "Replace with Kontur.Focus API key";
$client = new \ASavenkov\KonturFocus\Client($token);
```

Then call API methods as specified below.

### [Get brief report](https://developer.kontur.ru/doc/focus/method?type=get&path=%2Fapi3%2FbriefReport)

```php
$inn = '6663003127';
$briefReport = $client->getBriefReport($inn);
var_dump($briefReport);

object(ASavenkov\KonturFocus\Models\BriefReport)#48 (7) {
  ["inn"]=>
  string(10) "6663003127"
  ["ogrn"]=>
  string(13) "1026605606620"
  ["focusHref"]=>
  string(50) "https://focus.kontur.ru/entity?query=1026605606620"
  ["href"]=>
  string(188) "https://focus-lite.kontur.ru/briefReport?ogrn=1026605606620&mac=2c53c53f4862bb35419d65b4972ec6c027a14d7b&ltoken=uov9xc2MZVZKVk4nvGxOijFT5b6IImYMqpnDuBXs7fNSWaaALKkXySdiN_ifAJxqjlhOlxlVF-Y1"
  ["greenStatements"]=>
  bool(true)
  ["yellowStatements"]=>
  bool(true)
  ["redStatements"]=>
  bool(false)
}
```


## Development setup

```sh
$ composer install
$ ./vendor/bin/phpunit
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Make sure to add or update tests as appropriate.

Use [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0-beta.4/) for commit messages.

## [Changelog](CHANGELOG.md)

## License

[MIT](https://choosealicense.com/licenses/mit/)

<!-- Markdown link & img dfn's -->

[packagist-url]: https://packagist.org/packages/asavenkov/kontur-focus
[packagist-image]: https://poser.pugx.org/asavenkov/kontur-focus/v/stable.svg
[downloads-image]: https://poser.pugx.org/asavenkov/kontur-focus/downloads.svg
[license-image]: https://poser.pugx.org/asavenkov/kontur-focus/license.svg