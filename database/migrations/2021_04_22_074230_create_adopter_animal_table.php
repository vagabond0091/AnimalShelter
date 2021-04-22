<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopterAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopter_animal', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained('animals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('adopter_id')->constrained('adopters')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('adopter_animal');
    }
}
