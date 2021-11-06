<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=> $this->faker->sentence(6, true),
            "duration" => $this->faker->time(),
            "content" => $this->faker->paragraphs(10, true),
            "courses_id" => $this->faker->numberBetween(1,5)
        ];
    }
}