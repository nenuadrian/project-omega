# server

## Setup

First good thing to do is run `setup.sh PATH_OF_PUBLIC` to install PHP dependencies.

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
