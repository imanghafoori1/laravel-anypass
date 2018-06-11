# Laravel Anypass

![anypass_header](https://user-images.githubusercontent.com/6961695/40175717-4fa063de-59ee-11e8-8124-fbb53c8ba653.png)

[![Latest Stable Version](https://poser.pugx.org/imanghafoori/laravel-anypass/v/stable)](https://packagist.org/packages/imanghafoori/laravel-anypass)
<a href="https://scrutinizer-ci.com/g/imanghafoori1/laravel-anypass"><img src="https://img.shields.io/scrutinizer/g/imanghafoori1/laravel-anypass.svg?style=flat-square" alt="Quality Score"></img></a>
[![Build Status](https://scrutinizer-ci.com/g/imanghafoori1/laravel-anypass/badges/build.png?b=master)](https://scrutinizer-ci.com/g/imanghafoori1/laravel-anypass/build-status/master)

### Built with :heart: for every "lazy" laravel developer ;)


It is always painful to remember and type in the correct password in the login form while you are in development...

It would be nice to be able to login with any password in local environment and only by changing the .env variables(not the application code), switch to: "real password checking". 

(This means you do not need to change your application code, when you deploy your app to production while you enjoy the ease in local environments.)


Actually the behaviour of the `auth()->attempt($credentials); ` simply changes based on the config variable in the auth.php and .env file!


#### Performance hit: 

This package is only a few lines (about 20 lines) of code with almost no overhead.

It is also completely safe to avoid installing it on production without changing your code. Since it is a dev only dependency in your composer.json file.
```js
  "require-dev": {
       "imanghafoori/laravel-anypass": "dev-master",
        ...
  },
```
## Config 

To avoid accidental security vulnerabilities, 3 conditions should match before you can login with any password :

in your .env file you must:
```
1 - APP_ENV=local  // or APP_ENV=testing
2 - APP_DEBUG=true
3 - ANY_PASS=true
```
 
That way it is very unlikely to accidentally misconfigure your app to accept any wrong password on production server.

We highly recommend to take a look to the source code.

## :heartbeat: Note 

You can not login with an invalid username or an invalid api token. Only the password checking is by-passed.

## :fire: Installation

```
composer require --dev imanghafoori/laravel-anypass
```


(For laravel 5.4 and below: Instead of adding the service provider in the config/app.php file, you can add the following code to your app/Providers/AppServiceProvider.php file, within the register() method:

```php
public function register()
{
    if ($this->app->environment() === 'local' || $this->app->environment() === 'testing') {
        $this->app->register(\Imanghafoori\AnyPass\AnyPassServiceProvider::class);
    }
    // ...
}
```

### :exclamation: Security
If you discover any security related issues, please email imanghafoori1@gmail.com instead of using the issue tracker.


### :star: Your Stars Make Us Do More :star:
As always if you found this package useful and you want to encourage us to maintain and work on it, Please press the star button to declare your willing.


### More from the author:

 :gem: A minimal yet powerful package to give you opportunity to refactor your controllers.

- https://github.com/imanghafoori1/laravel-terminator

------------------

 :gem: A minimal yet powerful package to give a better structure and caching opportunity for your laravel apps.

- https://github.com/imanghafoori1/laravel-widgetize


-------------------

 :gem: A simple package that lets you easily impersonate your users.

- https://github.com/imanghafoori1/laravel-MasterPass
