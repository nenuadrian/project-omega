# server

## Setup

```
curl -sS https://getcomposer.org/installer | php

php composer.phar install

/usr/local/php80/bin/php composer.phar install

rm -rf ../../domain
mv public_html ../../domain
```

Then there is a `/setup` screen to install the DB and creating configuration files automagically.

## Setup Locally

Install MAMP https://www.mamp.info/

## To Publish

```
rm -rf vendor
composer install --no-dev
```

Publish via FTP copy.

## Tests
```
./vendor/bin/phpunit tests
```

## Static Code Analysis 

```
vendor/bin/phpstan analyse src tests
```
