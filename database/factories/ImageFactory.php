<?php

use App\Model\Image;
use App\Model\Content\Category;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'title' => $faker->sentence,
        'category_id' => factory(Category::class)->create()->id,
    ];
});
