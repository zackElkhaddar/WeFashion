<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->numberBetween($min = 500, $max = 1000),
        'size'=>$faker->randomElement(['XS','S','M','L','XL']),
        'is_visible'=>$faker->boolean(),
        'statut'=>$faker->randomElement(['sales','standard']),
        'reference'=>str_random(16),
        'categorie_id'=>$faker->numberBetween($min =1, $max = 2)

    ];
});