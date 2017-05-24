Pizza Web App
========================

The application will allow the users to manage a small catalog of pizzas and the ingredients needed to bake them.

In particular, users must be able to add and remove the ingredients of an existing pizza (and if possible give those
ingredients an order of appearance).

* Ingredients
    An ingredient has a name and a cost price.

* Pizzas
    A pizza has a name, a selling price and is made from several ingredients.

This application uses :
    * Symfony2
    * MySQL
    * Angular 1.4


Installation
--------------

#### Require vendors with composer:

```
composer install 
```


#### Database configuration:

```
 php app/console doctrine:database:create
 php app/console doctrine:schema:update --force
 php app/console ingredient:create
 php app/console pizza:create
```

#### JS Routing configuration:

```
 php app/console fos:js-routing:dump
```


Usage
-----

The URL of the web app is : 

```
http://<DOMAIN>:<PORT>/pizza-web-app/web/app_dev.php
```



