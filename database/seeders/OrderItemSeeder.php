<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use Faker\Factory as Faker;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $productIDs = Product::pluck('id');
        $orders = Order::all();
        foreach($orders as $order)
        {
            for($i = 0; $i < 10; $i++)
            {
                Order_Item::create([
                    'order_id' => $order->id,
                    'product_id' => $faker->randomElement($productIDs),
                    'quantity' => $faker->numberBetween(1, 5)
                ]);
            }
        }
    }
}
