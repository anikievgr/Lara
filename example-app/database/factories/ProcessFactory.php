<?php

namespace Database\Factories;

use App\Services\Models\Process;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Services\Models\Process>
 */
class ProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Process::class;
    public function definition()
    {
        return [
            'nameprocess' => $this->faker->text(10),
            'nomerprocess' => $this->faker->randomDigitNotNull(),
            'color' => $this->faker->rgbaCssColor()

        ];
    }
}
