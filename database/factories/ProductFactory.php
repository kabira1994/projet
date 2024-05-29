<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'image'=>$this->faker->randomElement(
                [
                'storage\products\images\image1.jpg',
                'storage\products\images\image2.png',
                'storage\products\images\image3.jpg',
                'storage\products\images\image4.png',
                'storage\products\images\image5.jpg',
                'storage\products\images\image6.png'
                ]
            )               //
            ];
    }
}