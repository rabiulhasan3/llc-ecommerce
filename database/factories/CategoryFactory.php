<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(random_int(10,15)),
        'banner' => $faker->imageUrl(),
    ];
});
