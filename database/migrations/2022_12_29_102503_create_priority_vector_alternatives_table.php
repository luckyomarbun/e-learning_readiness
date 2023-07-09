<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriorityVectorAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority_vector_alternatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternative_id')->references('id')->on('alternatives');
            $table->foreignId('criteria_id')->references('id')->on('criterias');
            $table->float('value');
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
        Schema::dropIfExists('priority_vector_alternatives');
    }
}
