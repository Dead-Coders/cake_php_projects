# One CakePHP project a day challenge - Day 03 Recipe Box with CouchDB (and https://github.com/PHP-on-Couch)

On this project I'm using CakePHP 4, CouchDB 3.1.1, https://github.com/PHP-on-Couch, and bootstrap 5

## Steps to create this projecta
- Setup a docker container for couchdb (https://hub.docker.com/_/couchdb)
- Create a couchdb
  ```
    your_username:user_secret@127.0.0.1:5984/recipes
  ```
- 049c71c  Initial Setup and Bootstrap Setup
   ```
   composer create-project --prefer-dist cakephp/app
  ```
- fd00b2d Added PHP-on-Couch/PHP-on-Couch and client a base factory client action
  ```
  composer require php-on-couch/php-on-couch
  ```
- update CouchDB url config at app_local.php
  ```
  'CouchDB' => [
        'default' => [
            'url' => 'http://your_username:user_secret@couchdb_container_host_name:5984',
        ],
    ],
  ```
- 9f433c0 Added model logic to retrieve recipes from couch db
- a4374c1 Added recipes index page and retrieving data from couch db
- ce3ffdc Added recipes view page and retrieving one document from couch db
- c6e918e Added action to add recipe using couchdb
- 19c5592 Added action to edit recipe

## Links
- https://github.com/PHP-on-Couch
- https://docs.couchdb.org/
- https://hub.docker.com/_/couchdb
