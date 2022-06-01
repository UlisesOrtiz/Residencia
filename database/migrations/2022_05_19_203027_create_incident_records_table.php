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
        Schema::create('incident_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('incident_id');
            $table->unsignedInteger('user_id');
            $table->string('year');
            $table->tinyInteger('penalty_done')->default(0);
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
        Schema::dropIfExists('incident_records');
    }
};
