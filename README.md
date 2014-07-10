# Hacks
- puPHPet generate vagrant file with bad file permission (don't change file in this repo)
- puPHPet generate AllowOverride not properly (don't change `/puphpet/puppet/modules/apache/manifests/vhost.pp` file in this repo)

# Template project
This branch use php5.5 and yii1.1.14

# Environment

mashine based on Debian Wheezy 7.5 x32

80 port forwarded on 8000 !!!!
3000 port forwarded on 3000 !!!!

## What's included

1. Apache
  - mod-rewrite
  - mod-proxy
  - mod-cache
  - mod-spdy
2. MySQL
3. PHP 5.5
  - php-cli
  - php-curl
  - php-gd
  - php-geoip
  - php-imagick
  - php-intl
  - php-mcrypt
  - php-memcashe
  - php-memcashed
  - php-mysql
  - 1 composer
  - xdebug
4. PHPMyAdmin (/var/www/phpmyadmin)
5. curl
6. wget
7. git
8. vim
9. mc

## How to set up environment

- `vagrant up`

That's it! You are all set.

## Sync directory

`/var/www/default`

## Apache logs

error `/var/log/apache2/default_vhost_80_error.log`

other `/var/log/apache2/default_vhost_80_access.log`

## Credintals

###VM

`vagrant vagrant`

###MySQL

Inside development environment PhpMyAdmin will be available on http://localhost:3000/

Database **______**

`user=root && pass=mysql`