<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('product', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('Descripcion');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }
        //
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

