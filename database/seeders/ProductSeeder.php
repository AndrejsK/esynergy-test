<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::create(['name' => 'HDD 1TB', 'amount' => 55, 'price' => 74.09]);
        Product::create(['name' => 'HDD SSD 512GB', 'amount' => 102, 'price' => 190.99]);
        Product::create(['name' => 'RAM DDR4', 'amount' => 47, 'price' => 80.32]);
    }
}
