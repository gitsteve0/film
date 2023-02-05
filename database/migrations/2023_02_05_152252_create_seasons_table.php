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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('age_id')->index()->nullable();
            $table->foreign('age_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->foreign('country_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->unsignedBigInteger('genre_id')->index()->nullable();
            $table->foreign('genre_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->unsignedBigInteger('language_id')->index()->nullable();
            $table->foreign('language_id')->references('id')->on('attribute_values')->nullOnDelete();
            $table->string('name');
            $table->string('code')->unique();
            $table->unsignedInteger('year')->default(0);
            $table->text('description')->nullable();
            $table->unsignedInteger('favorites')->default(0);
            $table->unsignedFloat('rating')->default(0);
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
        Schema::dropIfExists('seasons');
    }
};
