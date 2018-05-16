# Laravel Anypass

![anypass_header](https://user-images.githubusercontent.com/6961695/39835544-afbb2178-53e5-11e8-8f25-51717c21a8d2.png)


It is always painful to remember and type in the correct password in the login form while you are in development...

It would be nice to be able to login with any password in local environment and only by changing the .env variables to switch to real password checking. 

(This means you do not need to change your application code, when you deploy your app to production.)


Actually the behaviour of the `auth()->attempt($credentials); ` simply changes based on the config variable in the auth.php and .env file!


#### Performance hit: 

This package is only a few lines (about 20 lines) of code with almost no overhead.

It is also completely safe not to install it on production. Since it is a dev only dependency in your composer.json file.
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

## Note 

You can not login with an invalid username or an invalid api token. Only the password checking is by-passed.

# Installation

```
composer require --dev imanghafoori/laravel-anypass
```


(For laravel 5.4 and below: you must add the service provider into the `config/app.php`)
```php
\Imanghafoori\AnyPass\AnyPassServiceProvider::class
```



### :exclamation: Security
If you discover any security related issues, please email imanghafoori1@gmail.com instead of using the issue tracker.


### :star: Your Stars Make Us Do More :star:
As always if you found this package useful and you want to encourage us to maintain and work on it. Just press the star button to declare your willing.


### More from the author:

https://github.com/imanghafoori1/laravel-terminator

https://github.com/imanghafoori1/laravel-widgetize
