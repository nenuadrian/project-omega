# server

## Setup

```
rm -rf domain.com
ln -s project-omega/server/public_html domain.com
```

```
curl -sS https://getcomposer.org/installer | php

php composer.phar install

/usr/local/php80/bin/php composer.phar install
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
/usr/local/php80/bin/php vendor/bin/phpstan analyse src tests
```

