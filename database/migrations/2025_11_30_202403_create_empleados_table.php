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
    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->date('fecha_nacimiento');
        $table->string('departamento')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('empleados');
}

};
