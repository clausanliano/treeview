<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('pai_id')->nullable();
            $table->timestamps();
        });


        Schema::table('categorias', function (Blueprint $table) {
            $table->foreign('pai_id')->references('id')->on('categorias');
        });

    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
