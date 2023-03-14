<?php

namespace Database\Factories;

use App\Models\Map;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Map>
 */
class MapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Map::class;
    public function definition()
    {
        return [
            'href' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2231.388937338009!2d50.44523721530822!3d55.99461538078406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415f23a3073071d9%3A0x741bef279139179!2z0KLQkNCY0KQt0J3QmiDQkNCX0KEg4oSWNzEwICjQotCQ0KLQndCV0KTQotCV0J_QoNCe0JTQo9Ca0KIp!5e0!3m2!1sru!2sru!4v1673074739658!5m2!1sru!2sru',
        ];
    }
}
