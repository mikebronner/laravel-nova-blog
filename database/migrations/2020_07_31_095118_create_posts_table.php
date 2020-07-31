<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("author_id")->nullable();
            $table->bigInteger("governor_owned_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime("published_at")->nullable();

            $table->text("excerpt");
            $table->text("featured_image")->nullable();
            $table->text("message");
            $table->string("title");

            $table->foreign("author_id")
                ->references("id")
                ->on("users")
                ->onUpdate("CASCADE")
                ->onDelete("SET NULL");
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
