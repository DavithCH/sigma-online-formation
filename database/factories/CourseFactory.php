<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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

        // $image = $this->faker->image();
        // $imageFile = new File($image);
        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->realText(100,2),
            // 'image' => Storage::putFile('images', $imageFile, 'public'),
            'image' => 'https://source.unsplash.com/1600x900/?'.$this->faker->jobTitle(),
            'price' => $this->faker->randomFloat(2, 50,200),
            'rate' => $this->faker->numberBetween(0,5),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
