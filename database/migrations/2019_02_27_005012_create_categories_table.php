<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128)->unique();
            $table->string('slug', 128)->unique();
            $table->string('banner', 128);
            $table->unsignedInteger('category_id')->default(0);
            $table->timestamps();
<<<<<<< HEAD
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
=======
>>>>>>> 10488c428358c5c2a417194b5d83a5db9add0a83
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
