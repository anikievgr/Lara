<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;
    public function definition()
    {
        return [
           'product' => $this->faker->name(),
            'price' => '400',
            'quantity' => '4',
            'status' => 'off',
            'user_id' => User::get()->random()->id,
            'date' => $this->faker->date('Y-m-d')
        ];
    }
}
