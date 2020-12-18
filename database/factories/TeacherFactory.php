<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(2, 11),
            'teacher_fullname' => $this->faker->name,
            'teacher_code' => Str::of(Str::random(3))->upper(),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Teacher $teacher) {
    //         $lesson = Lesson::find(rand(1, 10));
    //         $teacher->lessons()->attach($lesson);
    //     });
    // }
}
