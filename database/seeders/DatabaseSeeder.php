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
        // $this->call(UserSeeder::class);
        User::factory()->create();
        Student::factory(10)->create();
        Teacher::factory(10)->create();
        Lesson::factory(10)->create();
        Module::factory(10)->create();
        Grade::factory(10)->create();
    }
}
