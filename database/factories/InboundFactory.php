<?php

namespace Database\Factories;

use App\Models\Inbound;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InboundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inbound::class;

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
            'buy_price' => $this->faker->randomFloat(2,0,500),
            'expiration_date' => $this->faker->dateTimeBetween('now','+2 years'),
        ];
    }
}
