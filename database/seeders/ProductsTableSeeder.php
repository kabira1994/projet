<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    
    public function run()
    {
        // Use the factory to create products
        Product::factory()->count(10)->create();
        

    }

}
