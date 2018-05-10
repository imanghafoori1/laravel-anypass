# Laravel Anypass

![anypass_header](https://user-images.githubusercontent.com/6961695/39835544-afbb2178-53e5-11e8-8f25-51717c21a8d2.png)


It is always painful to remember and type in the correct password in the login form while you are in development...

It would be nice to be able to login with any password in local environment and only by changing the .env variables switch to real password checking. 

This means you do not need change you application code at all when you deploy your app to production, to accept real passwords.


Actually the behaviour of the
```php
auth()->attempt($credentials); 
```
simply changes based on the config variable in the auth.php and .env file

to  avoid accidental security vulnaribilties, 3 conditions should match before you can login with any password :

first, in your .env file you must:
```
1 - APP_ENV=local
2 - APP_DEBUG=true
```

and in the `auth.php` file you must change:
```php
'driver' => 'eloquent',
```
to
```php
3 -   'driver' => 'eloquentAnyPass', // for eloquent user provider
```
  or
```php
  'driver' => 'databaseAnyPass', // for database user provider
```

![image](https://user-images.githubusercontent.com/6961695/39836414-8a173288-53e8-11e8-8a4e-bc42dc7becc5.png)

  
That way it is very unlikely to accidentally misconfigure your app to accept any wrong password in production.

### Note:
If for any reason, you want to keep your `APP_ENV=local` and `APP_DEBUG=true` in production, you can set `ANY_PASS=false` to forcefully turn it off and accept real passwords.

# Installtion

```
composer require imanghafoori/laravel-anypass
```

### :exclamation: Security
If you discover any security related issues, please email imanghafoori1@gmail.com instead of using the issue tracker.


### :star: Your Stars Make Us Do More :star:
As always if you found this package useful and you want to encourage us to maintain and work on it. Just press the star button to declare your willing.


#### More from the author:

https://github.com/imanghafoori1/laravel-terminator

https://github.com/imanghafoori1/laravel-anypass
