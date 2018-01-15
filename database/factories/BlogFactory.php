<?php

use App\Model\Blog;
use App\Model\Content\Tag;
use App\Model\Content\Category;
use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'content' => $faker->text(500),
        'picture' => $faker->imageUrl(),
        'category_id' => factory(Category::class)->create()->id,
    ];
});
