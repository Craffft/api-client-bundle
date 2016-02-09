Contao 4 API Client Bundle
=======================

The API Client Bundle adds a barcode and qrcode wizard to Contao

Installation
------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require craffft/barqrcodewizard-bundle "dev-master"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Craffft\ApiClientBundle\CraffftApiClientBundle(),
        );

        // ...
    }

    // ...
}
```

Usage
-----

Extend your security.yml

```php
<?php
// app/config/security.yml

security:
    // ...

    providers:
        craffft.api_client.security.user_provider:
            id: craffft.api_client.security.user_provider

    // ...

    firewalls:
        api:
            pattern: ^/api
            stateless: true
            simple_preauth:
                authenticator: craffft.api_client.security.api_key_authenticator
            provider: craffft.api_client.security.user_provider

    // ...
```
