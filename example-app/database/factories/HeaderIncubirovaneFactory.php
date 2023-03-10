<?php

namespace Database\Factories;

use App\Models\HeaderIncubirovane;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeaderIncubirovane>
 */
class HeaderIncubirovaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = HeaderIncubirovane::class;
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'title' => $this->faker->text(10),
            'image' => 'uploads/'.$faker->image('public/storage/uploads',1920,714,  false),

        ];
    }
}
