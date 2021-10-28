<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->realText(100,2),
            'image' => $this->faker->imageUrl(640,480),
            'price' => $this->faker->randomFloat(4),
            'rate' => $this->faker->numberBetween(0,5),
            'user_id' => '1',
        ];
    }
}
