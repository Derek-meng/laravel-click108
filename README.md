Laravel package for [Click108 Web](https://astro.click108.com.tw/) Twelve Constellations
-

System requirement
-
PHP >= 7.2
Laravel >=5.0

Installation
-
You can install derek/laravel-click108 via Composer by adding "derek/laravel-click108": "^1.0" as requirement to your composer.json.     
     
     composer require derek/laravel-click108 

Service Provider
-
If you are using Laravel 5.5 or higher the package will automatically register itself. 

Otherwise you need to add Jubilee\Click108\TwelveConstellationsProvider to 

your [providers](https://laravel.com/docs/master/providers#registering-providers) array.
 
Then you will have access to the services above.

This package has configuration files which can be configured to your needs.

    php artisan vendor:publish


Database
-
Setup your database migrations for the twelve_constellations

    php artisan migrate 
      
        
        
