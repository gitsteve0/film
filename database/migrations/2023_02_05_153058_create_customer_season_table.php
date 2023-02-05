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
        Schema::create('customer_season', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')->references('id')->on('seasons')->cascadeOnDelete();
            $table->primary(['customer_id', 'season_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_season');
    }
};
