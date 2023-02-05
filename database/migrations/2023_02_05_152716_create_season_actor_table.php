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
        Schema::create('season_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();
            $table->unsignedBigInteger('actor_id')->index();
            $table->foreign('actor_id')->references('id')->on('actors')->cascadeOnDelete();
            $table->primary(['season_id', 'actor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season_actor');
    }
};
