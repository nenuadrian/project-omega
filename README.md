# Project Omega - Light PHP MVC

[![PHP Composer](https://github.com/nenuadrian/project-omega/actions/workflows/php.yml/badge.svg)](https://github.com/nenuadrian/project-omega/actions/workflows/php.yml)
[![Node.js CI](https://github.com/nenuadrian/project-omega/actions/workflows/node.js.yml/badge.svg)](https://github.com/nenuadrian/project-omega/actions/workflows/node.js.yml)

Lightweight Model-View-Controller (MVC) framework for PHP that aims to provide a simple and efficient solution for building web applications. It emphasizes simplicity, flexibility, and performance, making it ideal for small to medium-sized projects.


# Add key to github 
```
ssh-keygen -t rsa
cat .ssh/id_rsa.pub

git config --global user.email adrian.nenu@gmail.com
git config --global user.name Adrian
```

## Add webhook for auto-deploy

Webhook to `https://domain.com/deploy/deploy` in GitHub hooks e.g. https://github.com/nenuadrian/cardinal/settings/hooks

# Server 

Custom PHP MVC.

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

## Tests
```
./vendor/bin/phpunit tests
```

## Static Code Analysis 

```
vendor/bin/phpstan analyse src tests
/usr/local/php80/bin/php vendor/bin/phpstan analyse src tests
```

# Install 
```
git clone git@github.com:nenuadrian/project-omega.git

git submodule update --init --recursive

git pull --recurse-submodules
```
