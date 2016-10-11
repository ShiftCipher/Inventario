<?php

use Faker\Generator;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Event::class, function ($faker) {
  return [
    'start' => $faker->time($format = 'H:i:s', $max = 'now'),
    'end' => $faker->time($format = 'H:i:s', $max = 'now'),
    'product_id' => $faker->numberBetween($min = 1, $max = 10),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'order_id' => 1,
    'user_id' => 4,
  ];
});

$factory->define(App\Category::class, function ($faker) {
  return [
    'name' => $faker->word,
    'photo' => "/img/categories/ipad.jpeg",
    'views' => 1000,
    'description' => $faker->text,
  ];
});

$factory->define(App\State::class, function ($faker) {
  return [
    'name' => $faker->word,
    'label' => 'label label-success'
  ];
});

$factory->define(App\Country::class, function ($faker) {
  return [
    'name' => $faker->country,
  ];
});

$factory->define(App\Region::class, function ($faker) {
  return [
    'name' => $faker->state,
  ];
});

$factory->define(App\City::class, function ($faker) {
  return [
    'name' => $faker->city,
  ];
});

$factory->define(App\Store::class, function ($faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->text,
    'telephone' => $faker->phoneNumber,
    'adress' => $faker->address,
    'photo' => "/img/stores/store.jpeg",
  ];
});

$factory->define(App\Product::class, function ($faker) {
  return [
    'name' => $faker->name,
    'photo' => "/img/products/ipad.jpeg",
    'warranty' => $faker->numberBetween($min = 1, $max = 60),
    'price' => $faker->numberBetween($min = 100000, $max = 5000000),
    'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'year' => $faker->numberBetween($min = 2010, $max = 2016),
    'serial' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]')
  ];
});

$factory->define(App\Maintenance::class, function ($faker) {
  return [
    'name' => $faker->catchPhrase,
    'description' => $faker->text,
  ];
});

$factory->define(App\User::class, function ($faker) {
  return [
    'dni' => $faker->unique()->ean8,
    'username' => $faker->unique()->userName,
    'email' => $faker->unique()->safeEmail,
    'first_name' => $faker->name,
    'last_name' => $faker->name,
    'first_lastname' => $faker->name,
    'last_lastname' => $faker->name,
    'address' => $faker->address,
    'telephone' => $faker->phoneNumber,
    'cellphone' => $faker->phoneNumber,
    'password' => bcrypt(str_random(10)),
    'photo' => "/img/users/profile.png",
    'remember_token' => str_random(10)
  ];
});

$factory->define(App\Comment::class, function ($faker) {
  return [
    'name' => $faker->bs,
  ];
});

$factory->define(App\Issue::class, function ($faker) {
  return [
    'name' => $faker->bs,
  ];
});

$factory->define(App\Cart::class, function ($faker) {
  return [
  ];
});

$factory->define(App\Order::class, function ($faker) {
  return [
  ];
});

$factory->define(App\Sale::class, function ($faker) {
  return [
  ];
});

$factory->define(App\Role::class, function ($faker) {
  return [
    'name' => $faker->name,
  ];
});
