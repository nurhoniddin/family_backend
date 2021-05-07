<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('description_uz',120)->nullable();
            $table->string('description_ru',120)->nullable();
            $table->text('content_uz')->nullable();
            $table->text('content_ru')->nullable();
            $table->string('image')->nullable();
            $table->string('keywords_uz')->nullable();
            $table->string('keywords_ru')->nullable();
            $table->string('meta_description_uz')->nullable();
            $table->string('meta_description_ru')->nullable();
            $table->string('file')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('views')->default(0);
            $table->string('status');
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
        Schema::dropIfExists('posts');
    }
}
