<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('my_class_id');
            $table->foreignId('section_id');
            $table->foreignId('subject_id');
            $table->string('semester', 4);
            $table->string('year', 4);
            $table->string('period')->nullable();
            $table->boolean('status')->default(true);
            $table->tinyInteger('first_attendance')->nullable();
            $table->tinyInteger('first_mark')->nullable();
            $table->tinyInteger('second_attendance')->nullable();
            $table->tinyInteger('second_mark')->nullable();
            $table->tinyInteger('third_attendance')->nullable();
            $table->tinyInteger('third_mark')->nullable();
            $table->tinyInteger('final_mark')->nullable();
            $table->tinyInteger('average')->nullable();
            $table->string('grade', 20)->nullable();
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
        Schema::dropIfExists('marks');
    }
};
