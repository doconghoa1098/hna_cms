<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = News::class;

    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/uploads/news'), $width = 640, $height = 480, 'cats', false);
        
        return [
            "title" => $this->faker->title(),
            "author_id" => User::all()->random()->id,
            "image" =>  "uploads/news/" . $imgPath,
            'title' => $this->faker->title(),
            'content' => $this->faker->paragraph()
        ];
    }
}
