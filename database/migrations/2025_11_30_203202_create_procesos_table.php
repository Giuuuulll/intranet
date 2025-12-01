<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('procesos', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('archivo');   // nombre del archivo
        $table->string('extension'); // pdf, jpg, docx
        $table->string('subido_por')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('procesos');
}

};
