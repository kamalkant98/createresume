<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Userskills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  Schema::create('userskills', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('skillname');
            $table->string('percentage');
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
        Schema::dropIfExists('userskills');
    }
}
