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
            'image' => 'https://source.unsplash.com/1600x900/?programing'.$this->faker->jobTitle(),
            'price' => $this->faker->randomFloat(2, 50,200),
            'rate' => $this->faker->numberBetween(0,5),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
