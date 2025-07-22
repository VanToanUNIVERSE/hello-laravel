<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 5; $i++)
        {
            Order::create([
                'price' => $faker->numberBetween(300000, 500000),
                'status' => 'pending',
                'payment_method' => $faker->randomElement(['cod', 'bank_transfer']),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
