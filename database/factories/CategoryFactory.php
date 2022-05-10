<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ids = Category::pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'parent_id' => empty($ids) ? null : $this->faker->optional(0.9, null)->randomElement($ids),
        ];
    }
}
