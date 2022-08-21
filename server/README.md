# server

## Environment configs - database

server/src/configs/environment.json

```
{
    "db_host": "localhost",
    "db_user": "root",
    "db_pass": "root",
    "db_name": "hades"
}
```

## Setup Locally

Install MAMP https://www.mamp.info/

```
composer install
```

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
