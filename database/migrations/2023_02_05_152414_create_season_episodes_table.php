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
        Schema::create('season_episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();
            $table->string('name');
            $table->unsignedInteger('number')->default(0);
            $table->string('duration')->default(0);
            $table->unsignedInteger('viewed')->default(0);
            $table->string('video')->nullable();
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
        Schema::dropIfExists('season_episodes');
    }
};
