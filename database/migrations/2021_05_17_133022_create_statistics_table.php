<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->text('title_statistic_uz')->nullable();
            $table->text('text_statistic_uz')->nullable();
            $table->text('title_statistic_ru')->nullable();
            $table->text('text_statistic_ru')->nullable();
            $table->text('title_marriages_uz')->nullable();
            $table->text('count_marriages_uz')->nullable();
            $table->text('title_marriages_ru')->nullable();
	        $table->text('count_marriages_ru')->nullable();
            $table->text('title_born_uz')->nullable();
            $table->text('count_born_uz')->nullable();
            $table->text('title_born_ru')->nullable();
	        $table->text('count_born_ru')->nullable();
            $table->text('title_happy_uz')->nullable();
            $table->text('count_happy_uz')->nullable();
            $table->text('title_happy_ru')->nullable();
	        $table->text('count_happy_ru')->nullable();
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
        Schema::dropIfExists('statistics');
    }
}
