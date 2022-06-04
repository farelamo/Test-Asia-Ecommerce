<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
           $table->uuid('id')->primary();
           $table->string('comment', 50);
           $table->uuid('post_id');
           $table->uuid('user_id');
           $table->timestamps();
           $table->foreign('post_id')->references('id')->on('posts');
           $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
