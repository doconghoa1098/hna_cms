<?php

namespace Database\Factories;

use App\Models\Maker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->regexify('[A-Za-z0-9]{5,20}'),
            'price' => $this->faker->randomFloat(8, 2, 10000),
            'image' => $this->faker->image('storage/app/public/images/products', 640, 480, null, false),
            'maker_id' => Maker::all()->random()->id,
            'content' => $this->faker->text(20),
        ];
    }
}
