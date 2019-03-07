<?php

use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\Category;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'title' => $faker->text(15),
        'description' => $faker->realText(),
        'price' => random_int(100,1000),
        'sale_price' => random_int(0,1000),
    ];
});
