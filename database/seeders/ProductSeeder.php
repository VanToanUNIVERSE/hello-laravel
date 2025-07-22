<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = Category::all();

        foreach($categories as $category)
        {
            for($i = 0; $i < 10; $i++)
            {
                Product::create([
                    'name' => $faker->sentence(3),
                    'price' => $faker->numberBetween(100000, 300000),
                    'image' => $faker->imageUrl(640, 480, 'fashion', true, 'clothes'),
                    'category_id' => $category->id
                ]);
            }
        }
    }
}
