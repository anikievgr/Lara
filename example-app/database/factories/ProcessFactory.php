<?php

namespace Database\Factories;

use App\Models\Process;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
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
            'color' => 'NULL'

        ];
    }
}
