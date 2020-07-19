# PayTech - PHP API Client

[![Coverage Status](https://img.shields.io/badge/coverage-99.25%25-success)](https://coveralls.io/github/PapiHack/paytech-php-client?branch=master)
![Issues](https://img.shields.io/github/issues/PapiHack/paytech-php-client)
![PR](https://img.shields.io/github/issues-pr/PapiHack/paytech-php-client)
[![Latest Stable Version](https://poser.pugx.org/papihack/paytech-php-client/v)](//packagist.org/packages/papihack/paytech-php-client)
[![Total Downloads](https://poser.pugx.org/papihack/paytech-php-client/downloads)](//packagist.org/packages/papihack/paytech-php-client)
[![Latest Unstable Version](https://poser.pugx.org/papihack/paytech-php-client/v/unstable)](//packagist.org/packages/papihack/paytech-php-client)
[![License](https://poser.pugx.org/papihack/paytech-php-client/license)](//packagist.org/packages/papihack/paytech-php-client)
[![Open Source Love png1](https://badges.frapsoft.com/os/v1/open-source.png?v=103)](https://github.com/ellerbrock/open-source-badges/)

This is a simple `SDK Client` or `API Client` for `PayTech Online Payment Gateway`.

Check out [PayTech SN Website](https://paytech.sn).

## How to use it

First of all, install the package or library via composer

- `composer require papihack/paytech-php-client`

After that, setup the API config with your parameters like this :

```php
    \PayTech\Config::setApiKey('your_api_key');
    \PayTech\Config::setApiSecret('your_api_secret');

    /*
     * you can set one of this two environment TEST or PROD
     * you can just set the env mode via \PayTech\Enums\Env::TEST or \PayTech\Enums\Env::PROD
     * Like the following example
     * !!! By default env is PROD !!!
    */

    \PayTech\Config::setEnv(\PayTech\Enums\Env::PROD);

    /*
     * The PayTech\Enums\Currency class defined authorized currencies
     * You can change XOF (in the following example) by USD, CAD, GBP or MAD
     * !!! Notice that XOF is the default currency !!!
    */

    \PayTech\Config::setCurrency(\PayTech\Enums\Currency::XOF);

    /* !!! Note that if you decide to set the ipn_url, it must be in https !!! */

    \PayTech\Config::setIpnUrl('your_ipn_url');
    \PayTech\Config::setSuccessUrl('your_success_url');
    \PayTech\Config::setCanceUrl('your_cancel_url');

    /*
     * if you want the mobile success or cancel page, you can set
     * the following parameter
    */

    \PayTech\Config::setIsMobile(true);
```

Then you can proceed with :

```php
    $article_price = 15000;
    $article = new \PayTech\Invoice\InvoiceItem('article_name', $article_price, 'command_name', 'ref_command');

    /* You can also add custom data or fields like this */

    \PayTech\CustomField::set('your_field_name', 'your_field_value');

    /* Make the payment request demand to the API */

    \PayTech\PayTech::send($article);

    /* Get the API Response */

    $response = [
        'success'      => \PayTech\ApiResponse::getSuccess(),
        'errors'       => \PayTech\ApiResponse::getErrors(),
        'token'        => \PayTech\ApiResponse::getToken(),
        'redirect_url' => \PayTech\ApiResponse::getRedirectUrl(),
    ];
```

After that, if you have a success response, you can redirect your user to the `$response['redirect_url']` so that he can make the payment.  
You can process the response as you wish by directly manipulating `\PayTech\ApiResponse`.

## TODO

- tests: cover all use cases ✅
- try to make a wrapper for IPN response
- get the support team at [paytech.sn](https://paytech.sn) to clarify certain points
- use mock instead of hitting real endpoint

## Contributing

Feel free to make a PR or posting an issue 😃

Regarding the tests, I use the elegant PHP Testing Framework  [Pest](https://pestphp.com/) 😎

Oh, one more thing, please do not forget to put a description when you make your PR 🙂

## Contributors

- <a href="https://itdev.herokuapp.com" alt="The IT DEV">M.B.C.M</a>
[![](https://img.shields.io/twitter/follow/the_it_dev?style=social)](https://twitter.com/the_it_dev)
