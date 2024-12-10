# One Project a Day with CakePHP - 02 Contact List

On this project I'm using CakePHP 4, bootstrap 5, https://github.com/FriendsOfCake/search,
https://github.com/FriendsOfCake/cakephp-upload and gravatar url.

## Steps to create this project

- e1196ff Initial Setup and Bootstrap Setup
   ```
   composer create-project --prefer-dist cakephp/app
  ```
- 28a0dea Migrations
  ```
  bin/cake bake migration CreateContacts name email phone twitter_username github_username
  bin/cake migrations migrate
  ```
- 68e0b1b Baking components
  ```
  bin/cake bake controller Contacts
  bin/cake bake templates Contacts
  bin/cake bake template Contacts
  ```
- 999bae5 Added bootstrap style to index to use list instead of tables
- 5c2cb52 Added bootstrap style to add|edit pages; Using one template for form pages
- 1a68882 Added bootstrap style to flash messages
- f86f449 Added FriendsOfCake/search
  ```
  composer require require friendsofcake/search
  bin/cake plugin load Search
  ```
- ca3d15d Add contact image using gravatar
- b886414 Added plugin FriendsOfCake/cakephp-upload to allow user to upload contact image
    ```
    composer require josegonzalez/cakephp-upload
    bin/cake plugin load Josegonzalez/Upload
    bin/cake bake migration AddPhotoToContacts photo
    bin/cake migrations migrate
    ```
