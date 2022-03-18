## Laravel Alpine Animations

[![Packagist License](https://poser.pugx.org/Jubeki/laravel-alpine-animations/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/Jubeki/laravel-alpine-animations/version.png)](https://packagist.org/packages/jubeki/laravel-alpine-animations)
<!-- ![Tests](https://github.com/Jubeki/laravel-alpine-animations/workflows/Tests/badge.svg) -->

## Installation

Require this package with composer.

```shell
composer require jubeki/laravel-alpine-animations
```

The service provider will be automatically registered using [package discovery](https://laravel.com/docs/5.8/packages#package-discovery).

If you don't use auto-discovery you should add the service provider to the providers array in `config/app.php`.

```php
// existing providers...
Jubeki\AlpineAnimations\AlpineAnimationsServiceProvider::class,
```

The standard styles are written with Tailwind CSS. If you want to make sure that all the styles are added to your resulting CSS File you should add the following path to your `tailwind.config.js`:
```js
module.exports = {
    content: [
        "./vendor/jubeki/laravel-alpine-animations/resources/**/*.blade.php"
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

## Usage

You can now start using all available components using the standard blade components syntax.

If a user doesn't have JavaScript enabled, then the default option will be shown.

## Components

### Typing

Minimal Example:
```blade
<x-alpine-animations::typing
    :values="['First Line', 'Second Line', 'Third Line']"
/>
```

Maximal Example (with Default values):
```blade
<x-alpine-animations::typing
    :values="['First Line', 'Second Line', 'Third Line']"
    start-at="0"
    init-delay="700"
    deleting-delay="70"
    typing-delay="100"
    start-deleting-delay="1200"
    start-typing-delay="300"
    toggle-cursor-delay="375"
    cursor="border-r-4"
    cursor-hidden="border-transparent"
    cursor-shown="border-black"
/>
```

You can also disable the cursor altogether which leaves only the typing and deleting of characters:
```blade
<x-alpine-animations::typing
    :values="['First Line', 'Second Line', 'Third Line']"
    :cursor="false"
/>
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](./.github/CONTRIBUTING.md) for details.

## Credits

- [Julius Kiekbusch](https://github.com/Jubeki)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
