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
            $table->text('title_marriage_uz')->nullable();
            $table->string('count_marriage_uz')->nullable();
            $table->text('title_marriage_ru')->nullable();
            $table->string('count_marriage_ru')->nullable();
            $table->text('title_happy_family_uz')->nullable();
            $table->string('count_happy_family_uz')->nullable();
            $table->text('title_happy_family_ru')->nullable();
            $table->string('count_happy_family_ru')->nullable();
            $table->text('divorce_title_uz')->nullable();
            $table->string('count_divorce_uz')->nullable();
            $table->text('divorce_title_ru')->nullable();
            $table->string('count_divorce_ru')->nullable();
            $table->text('title_women_uz')->nullable();
            $table->string('count_women_uz')->nullable();
            $table->text('title_women_ru')->nullable();
            $table->string('count_women_ru')->nullable();
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
