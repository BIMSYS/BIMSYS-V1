<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('teacher_id')->constrained('teachers')->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('task_id')->constrained('tasks')->onUpdate("cascade")->onDelete("cascade");
            $table->double('grade', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
