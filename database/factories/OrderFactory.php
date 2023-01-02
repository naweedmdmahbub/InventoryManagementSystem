<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'date' => $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d'),
        'project_id' => $this->faker->numberBetween($min = 1, $max = 3),
        'supplier_id' => $this->faker->numberBetween($min = 1, $max = 3),
        'payment_status' => 'unpaid',
        'purchase_status' => null,
        'total' => 0,
        'paid' => 0,
        'due' => 0,
        'total_discount' => 0,
        'discount_type' => $this->faker->randomElement(['percentage', 'fixed']),
        'notes' => $this->faker->sentence,
    ];
});
