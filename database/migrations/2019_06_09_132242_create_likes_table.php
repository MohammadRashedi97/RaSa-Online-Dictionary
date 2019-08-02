<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('persian_id');
            $table->unsignedBigInteger('english_id');
            $table->unsignedBigInteger('example_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('like');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('persian_id')->references('id')->on('persian_definitions')->onDelete('cascade');
            $table->foreign('english_id')->references('id')->on('english_definitions')->onDelete('cascade');
            $table->foreign('example_id')->references('id')->on('examples')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
