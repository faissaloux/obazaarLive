<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\StoresCategory;

$factory->define(StoresCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'slug' => $faker->slug,
		'image' => 'storesCategories/defaultCatImg'.$faker->numberBetween($min = 1, $max = 4).'.jpg',
		'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});
