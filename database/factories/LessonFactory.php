<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_name' => $this->faker->word,
            'lesson_code' => Str::of(Str::random(3))->upper(),
            'lesson_description' => $this->faker->text
        ];
    }
}
