# One CakePHP project a day challenge - Day 04 Service Plan with exchange rate

On this project I'm using CakePHP 4 and comsume api work with currency exchange (exchangeratesapi.io)

## Steps to create this projecta
- a7cbdf0 Initial Setup and Bootstrap Setup
- 98bca8d Added home page
- 2811a36 Migrations
  ```
  bin/cake bake migration CreatePlans name price:integer description
  bin/cake bake seed Plans
  bin/cake migrations migrate
  cake migrations seed
  ```
- b8db4ab Added list of plans
- 58ea47b Added logic to fetch rates using exchangeratesapi.io
- 7aef21e Added logic show show price with client rate (From url)

## Links
- https://exchangeratesapi.io/documentation/
