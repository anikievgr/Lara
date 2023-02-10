<?php

namespace Database\Factories;


use App\Models\TextIncubirovane;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Slide>
 */
class TextIncubirovaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TextIncubirovane::class;
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'text' => $this->faker->text(200),
        ];
    }
}
