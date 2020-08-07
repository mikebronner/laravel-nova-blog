<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime("published_at")->nullable();

            $table->string("name");
            $table->string("description")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
