<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->sentence,
        'description' => implode('', $faker->sentences),
        'price' => $faker->numberBetween($min = 1, $max = 100),
        'brand_id' => App\Brand::pluck('id')->random(),
        'image_url' => $faker->randomElement($array = array ('images/product/product1.jpg','images/product/product2.jpg','images/product/product3.jpg','images/product/product4.jpg','images/product/product5.jpg','images/product/product6.jpg')),
    ];
});
