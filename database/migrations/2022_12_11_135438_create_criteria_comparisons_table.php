<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_comparisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_criteria_id')->references('id')->on('criterias');
            $table->foreignId('value_weight_id')->references('id')->on('value_weights');
            $table->foreignId('second_criteria_id')->references('id')->on('criterias');
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
        Schema::dropIfExists('criteria_comparisons');
    }
}
