<?php

namespace Database\Factories;

use App\Models\Statisic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statisic>
 */
class StatisicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Statisic::class;
    public function definition()
    {
        return [
            'catery' => $this->faker->title(),
            'procent' => '0',
            ];
    }
}
