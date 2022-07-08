# Laravel Project Controlled

[![release](https://img.shields.io/github/release/laractrl/controlled)](https://github.com/laractrl/controlled/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/laractrl/controlled.svg)](https://packagist.org/packages/laractrl/controlled)
![laravel](https://img.shields.io/badge/Laravel-8%7C9-red)
[![Web site](https://img.shields.io/badge/website-laractrl.com-brightgreen)](https://laractrl.com)
[![Web site Status](https://img.shields.io/website-up-down-green-red/http/laractrl.com)](https://laractrl.com)
[![issues](https://img.shields.io/github/issues/laractrl/controlled)](https://packagist.org/packages/laractrl/controlled)
[![forks](https://img.shields.io/github/forks/laractrl/controlled)](https://packagist.org/packages/laractrl/controlled)
[![stars](https://img.shields.io/packagist/stars/laractrl/controlled)](https://packagist.org/packages/laractrl/controlled)
![example workflow](https://github.com/laractrl/controlled/actions/workflows/testing.yml/badge.svg)
[![DeepSource](https://deepsource.io/gh/laractrl/controlled.svg/?label=active+issues&show_trend=true&token=GU7mZ7deZTs5GAazEp9DpXZD)](https://deepsource.io/gh/laractrl/controlled/?ref=repository-badge)
[![DeepSource](https://deepsource.io/gh/laractrl/controlled.svg/?label=resolved+issues&show_trend=true&token=GU7mZ7deZTs5GAazEp9DpXZD)](https://deepsource.io/gh/laractrl/controlled/?ref=repository-badge)

Using this package you can easily control your laravel project
## Video
[![LaraCtrl Minyatore how to](https://user-images.githubusercontent.com/64494826/178027143-9aa51e30-16bd-46ac-b553-65dd6d797ecf.png)](https://youtu.be/sK9wsXppx4U)
## Installing
 :warning: **Don't install this package in local** : Be very careful here!
 
1) Command :
```php
  composer require laractrl/controlled
```

2) Publishing view and config files : 

```php
  php artisan vendor:publish --tag=controlled
```

3) Setup command :

```php
  php artisan controlled:up APP_KEY
```

  Or you can copy from table of [apps](https://laractrl.com/app) and click to action, click Copy Command
  
  Now go and control your app

  ## Codes :
  
  Code | R0000 | R0001 | R0002 | R0003 | R0004 |
--- | --- | --- | --- |--- |--- |
Description | Passed | App does not exist | Domain incorrect | IP incorrect | App locked |
