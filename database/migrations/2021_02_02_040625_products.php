<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    /*  Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('coverfile');
            $table->string('name');
            $table->string('maincategory');
            $table->string('subcategory');
            $table->string('price');
            $table->string('discount');
            $table->string('description');
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
