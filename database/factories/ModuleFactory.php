<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => rand(2, 11),
            'module_number' => rand(1, 10),
            'module_title' => $this->faker->sentence,
            'module_material' => $this->faker->text,
        ];
    }
}
