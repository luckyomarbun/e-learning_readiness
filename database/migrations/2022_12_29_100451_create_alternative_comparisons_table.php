<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_comparisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_alternative_id')->references('id')->on('alternatives');
            $table->foreignId('criteria_id')->references('id')->on('criterias');
            $table->foreignId('second_alternative_id')->references('id')->on('alternatives');
            $table->foreignId('value_weight_id')->references('id')->on('value_weights');
            $table->float('value');
            $table->integer('choosen');
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
        Schema::dropIfExists('alternative_comparisons');
    }
}
