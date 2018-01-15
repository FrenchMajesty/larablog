<?php

use App\Model\Content\Category;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word . $faker->word . $faker->word,
    ];
});
