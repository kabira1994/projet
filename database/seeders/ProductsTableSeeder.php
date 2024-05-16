<?php

namespace Database\Seeders;
use App\Models\Product;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Ajoutez des données de test pour les produits
          Product::create([
            'name' => 'Machine à Café Expresso',
            'description' => 'Machine à café expresso avec mousseur à lait intégré.',
            'price' => 99.99,
            'stock' => 10,
        ]);

        Product::create([
            'name' => 'Cafetière à Filtre Programmable',
            'description' => 'Cafetière à filtre programmable avec carafe en verre.',
            'price' => 49.99,
            'stock' => 20,
        ]);

        // Ajoutez d'autres produits selon vos besoins
        //
    }
}
