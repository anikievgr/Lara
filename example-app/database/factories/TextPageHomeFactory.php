<?php

namespace Database\Factories;

use App\Models\Slide;
use App\Models\TextPageHome;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Slide>
 */
class TextPageHomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TextPageHome::class;
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'text' => $this->faker->text(500),
        ];
    }
}
