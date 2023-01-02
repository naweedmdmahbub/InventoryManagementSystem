<?php

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Order::class, 10)->create()->each(function ($order) {
        //     $order->orderDetails()->saveMany(factory(OrderDetail::class, 3)->make());
        // });

        //create 10 orders
        factory(Order::class, 2)->create()->each(function ($order) {
            //create 5 OrderDetails for each order
            factory(OrderDetail::class, 3)->create(['order_id'=>$order->id]);
        });
    }

}
