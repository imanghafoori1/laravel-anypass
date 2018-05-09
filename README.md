# laravel-anypass
It is always painful to remember and type in the correct password in the login form while you are in development...

It would be nice to be able to login with any password in local environment and only by changing the .env variables switch to real password checking. 

This means you do not need change you application code at all when you deploy your app to production, to accept real passwords.


Actually the behaviour of the
```php
auth()->attempt($credentials); 
```
simply changes based on the config variable in the auth.php and .env file

to  avoid accidental security vulnaribilties 3 things should match :

in your .env file :
```
1 - APP_ENV=local
2 - APP_DEBUG=true
```

3 - in the `auth.php` file change:
```php
  'driver' => 'eloquent',
```
to
```php
  'driver' => 'eloquentAnyPass', // for eloquent user provider
```
  or
```php
  'driver' => 'databaseAnyPass', // for database user provider
```
  
  that way it is very unlikely to accidentally misconfigure your app to accept any wrong password in production.
