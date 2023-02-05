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
        Schema::create('season_director', function (Blueprint $table) {
            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();
            $table->unsignedBigInteger('director_id')->index();
            $table->foreign('director_id')->references('id')->on('directors')->cascadeOnDelete();
            $table->primary(['season_id', 'director_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season_director');
    }
};
