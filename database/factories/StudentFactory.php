<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(2, 11),
            'student_fullname' => $this->faker->name,
            'student_class' => rand(1, 12),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Student $student) {
    //         $lesson = Lesson::find(rand(1, 10));
    //         $student->lessons()->attach($lesson);
    //     });
    // }
}
