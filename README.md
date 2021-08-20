# [Kontur.Focus](https://developer.kontur.ru/doc/focus?about=0) API Client

[![Latest Stable Version][packagist-image]][packagist-url]
[![Total Downloads][downloads-image]][packagist-url]
[![License][license-image]][packagist-url]

## Installation

```sh
composer require asavenkov/kontur-focus
```

Requirements:

-   PHP 7.4.0+
-   Guzzle 6.3+

## Usage

Create API client instance:

```php
$token = "Replace with Kontur.Focus API key";
$client = new \ASavenkov\KonturFocus\Client($token);
```

Then call API methods as specified below.

### [Экспресс отчет по контрагенту](https://developer.kontur.ru/doc/focus/method?type=get&path=%2Fapi3%2FbriefReport)

**inn** - ИНН(ИП)

**ogrn** - ОГРН(ИП)

**focusHref** - Ссылка на карточку юридического лица (ИП) в Контур.Фокусе (для работы требуется подписка на Контур.Фокус и дополнительная авторизация)

**href** - Индивидуальная разовая ссылка на экспресс-отчет в Контур.Фокусе

**greenStatements** - Наличие информации, помеченной зеленым цветом

**yellowStatements** - Наличие информации, помеченной желтым цветом

**redStatements** - Наличие информации, помеченной красным цветом

```php
$inn = '6663003127';
$briefReport = $client->getBriefReport($inn);
var_dump($briefReport);

class ASavenkov\KonturFocus\Models\BriefReport#83 (7) {
  public string $inn =>
  string(10) "6663003127"
  public string $ogrn =>
  string(13) "1026605606620"
  public string $focusHref =>
  string(50) "https://focus.kontur.ru/entity?query=1026605606620"
  public string $href =>
  string(188) "https://focus-lite.kontur.ru/briefReport?ogrn=1026605606620&mac=6e0ffc0d857f91b5f879de457d0915b6ee2a6b2f&ltoken=_Xps6cOqRUL19mvogIMjqiBd87EWDQJH20_8HLDbnHLheAGlNP6h0x4HmZTHgjCKzaa1uhk5Q001"
  public bool $greenStatements =>
  bool(true)
  public bool $yellowStatements =>
  bool(false)
  public bool $redStatements =>
  bool(false)
}
```

### [Расширенная аналитика](https://developer.kontur.ru/doc/focus/method?type=get&path=%2Fapi3%2Fanalytics)

**inn** - ИНН(ИП)

**ogrn** - ОГРН(ИП)

**focusHref** - Ссылка на карточку юридического лица (ИП) в Контур.Фокусе (для работы требуется подписка на Контур.Фокус и дополнительная авторизация)

**isMSP** - Юр. признаки. Наличие категории микро/малого/среднего предприятия в едином реестре субъектов малого и среднего предпринимательства (ФНС)

**isRNP** - Госконтракты. Организация была найдена в реестре недобросовестных поставщиков (ФАС, Федеральное Казначейство)

```php
$inn = '6663003127';
$analytics = $client->getAnalytics($inn);
var_dump($analytics);

class ASavenkov\KonturFocus\Models\Analytics#108 (5) {
  public string $inn =>
  string(10) "6663003127"
  public string $ogrn =>
  string(13) "1026605606620"
  public string $focusHref =>
  string(50) "https://focus.kontur.ru/entity?query=1026605606620"
  public bool $isMSP =>
  bool(false)
  public bool $isRNP =>
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

## License

[MIT](https://choosealicense.com/licenses/mit/)

<!-- Markdown link & img dfn's -->

[packagist-url]: https://packagist.org/packages/asavenkov/kontur-focus
[packagist-image]: https://poser.pugx.org/asavenkov/kontur-focus/v/stable.svg
[downloads-image]: https://poser.pugx.org/asavenkov/kontur-focus/downloads.svg
[license-image]: https://poser.pugx.org/asavenkov/kontur-focus/license.svg