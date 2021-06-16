<?php

namespace Database\Factories;

use App\Models\Outbound;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutboundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Outbound::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(0,1000),
            'sell_price' => $this->faker->randomFloat(2,400,700)
        ];
    }
}
