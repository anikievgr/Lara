<?php

namespace Database\Factories;


use App\Models\TitlePageHome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Slide>
 */
class TitlePageHomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TitlePageHome::class;
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'text' => $this->faker->text(20),
        ];
    }
}
