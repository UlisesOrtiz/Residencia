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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->foreignId('my_class_id')->references('id')->on('my_classes');
            $table->foreignId('section_id')->references('id')->on('sections');
            $table->foreignId('teacher_id')->references('id')->on('users');     
            $table->string('time', 30);
            $table->boolean('status')->default(true);
            $table->tinyInteger('semester');
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
        Schema::dropIfExists('subjects');
    }
};
