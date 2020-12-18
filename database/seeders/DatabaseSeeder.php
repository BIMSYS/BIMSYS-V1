<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        User::factory()->times(10)->create();
        // $lesson = Lesson::factory()->count(10)->create();
        Student::factory()->times(10)->has(Lesson::factory()->count(5))->create();
        Teacher::factory()->times(10)->has(Lesson::factory()->count(5))->create();
        Module::factory()->times(10)->create();
        Grade::factory()->times(10)->create();
    }
}
