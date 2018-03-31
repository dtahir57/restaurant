<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items', function (Blueprint $table) {
          $table->integer('id')->unsigned();
          $table->string('menu_title');
          $table->string('sub_title');
          $table->string('sub_description');
          $table->string('sub_image');
          $table->string('sub_price');
          $table->integer('menu_id')->unsigned();
          $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
}
