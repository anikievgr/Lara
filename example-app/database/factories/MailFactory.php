<?php

namespace Database\Factories;

use App\Services\Models\Mail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Services\Models\Mail>
 */
class MailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mail::class;

    public function definition()
    {
        return [
            'mail' => $this->faker->email,
            'name' => $this->faker->name,
            'telephone' => $this->faker->phoneNumber,
            'theme' => 'Сотрудничество',
            'text' => $this->faker->text(300),
        ];
    }
}
