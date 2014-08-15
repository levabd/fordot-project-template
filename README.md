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

## Yii Environment Based on
- [YiiBooster](http://yiibooster.clevertech.biz/)
- [Gii templates](https://github.com/schmunk42/gii-template-collection)
- [yii-relation(for gii templates)](https://github.com/schmunk42/yii-relation)
- [yii-usr](https://github.com/nineinchnick/yii-usr)
- [REST Full API](https://github.com/evan108108/RESTFullYii)
- [swiftMailer](http://swiftmailer.org/)
- [yii-EClientScript minifier](https://github.com/muayyad-alsadi/yii-EClientScript)
- [Content Compactor minifier](http://www.yiiframework.com/extension/contentcompactor/)

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

For user modules:
`/protected/yiic migrate --migrationPath=application.modules.usr.migrations`