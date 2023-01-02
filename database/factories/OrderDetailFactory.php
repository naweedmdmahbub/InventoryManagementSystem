<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        // 'order_id' => factory(App\Models\Order::class),
        'order_id' => function() {
            return factory(Order::class)->create()->id;
        },
        'material_id' => function () {
            // Get random material id
            return Material::inRandomOrder()->first()->id;
        },
        'quantity' => $this->faker->numberBetween($min = 1, $max = 5),
        'unit_price' => $this->faker->numberBetween($min = 10, $max = 100),
        'discount' => 0,
        'total' => 0,
        'discount_type' => $this->faker->randomElement(['percentage', 'fixed']),
    ];
});
