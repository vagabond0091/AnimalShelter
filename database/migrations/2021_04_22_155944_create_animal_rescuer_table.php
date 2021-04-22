<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalRescuerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_rescuer', function (Blueprint $table) {
            $table->foreignId('rescuer_id')->constrained('rescuers')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreignId('animal_id')->constrained('animals')->onUpdate('Cascade')->onDelete('Cascade');
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
        Schema::dropIfExists('rescuer_animal');
    }
}
