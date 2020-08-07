<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime("published_at")->nullable();

            $table->text("description");
            $table->string("title");
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
