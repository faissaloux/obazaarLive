<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\StoresCategory;

$factory->define(StoresCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'slug' => $faker->slug,
		'image' => 'products/'.$faker->uuid.'.jpg',
		'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});
