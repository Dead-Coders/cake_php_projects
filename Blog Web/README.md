# One CakePHP project a day challenge - Day 12 Blog

On this project I'm using CakePHP 4, CakeDC/Users plugin,
friendsofcake/bootstrap-ui, Muffin/Slug, friendsofcake/search and Bootstrap 4

## Steps to create this project

- f76ae69 Init with composer create-project --prefer-dist cakephp/app
- e81c0e4 Added Base Models:
  ```
  bin/cake bake migration CreateBlogs title slug summary published:boolean content:text created modified
  bin/cake bake migration CreateTags name slug
  bin/cake bake migration CreateBlogsTags blog_id:integer tag_id:integer
  bin/cake migrations migrate
  bin/cake bake model Blogs
  bin/cake bake model Tags
  ```
- 7715fee Added plugin friendsofcake/bootstrap-ui:
  ```
  composer require friendsofcake/bootstrap-ui
  bin/cake plugin load BootstrapUI
  bin/cake bootstrap install
  bin/cake bootstrap modify_view
  bin/cake bootstrap copy_layouts
  ```
- 512dea1 Baked Admin as Initial Step:
  ```
  bin/cake bake controller --prefix Admin Tags
  bin/cake bake template -t BootstrapUI --prefix Admin Tags
  bin/cake bake controller --prefix Admin Blogs
  bin/cake bake template -t BootstrapUI --prefix Admin Blogs
  ```
- 03bfcc0 Added plugin UseMuffin/Slug:
  ```
  composer require muffin/slug
  bin/cake plugin load Muffin/Slug
  ```
- 6a5578b Added quilljs
- 9f4577d Added main view and list blogs pages template from https://github.com/StartBootstrap/startbootstrap-blog-post
- ae5f82f Added tags widget cell
- f34cabc Added search element
- c31af68 Added route and link to view a blog
- f86869a Added links to filter blogs by tag
- 98adde7 Show message em not found blogs
- 6678536 Remove invalid title
- bbb385d Added plugin friendsofcake/search
  ```
  composer require friendsofcake/search
  bin/cake plugin load Search
  ```
- 882d8a9 Added CakeDC/Users plugin
  ```
   composer require cakedc/users
   cp vendor/cakedc/users/config/users.php config/
   cp vendor/cakedc/users/config/permissions.php config/
   bin/cake migrations migrate
   bin/cake users add_superuser
  ```
- ba94f3f Update Home route to show blog list
- 5721200 Added element for nav

## Result (some pages)

![alt text](./result-12-blog-01.png)

![alt text](./result-12-blog-02.png)

![alt text](./result-12-blog-03.png)
