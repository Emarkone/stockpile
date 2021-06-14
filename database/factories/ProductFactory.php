<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'detail' => $this->faker->paragraph(2),
            'quantity' => $this->faker->numberBetween(0,1000),
            'buy_price' => $this->faker->randomFloat(2,0,500),
            'expiration_date' => $this->faker->dateTimeBetween('now','+2 years'),
            'active' => $this->faker->boolean(90)
        ];
    }
}
