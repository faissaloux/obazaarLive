<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostscategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('postscategories', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable()->default('NULL');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('postscategories');
    }
}