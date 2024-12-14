<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');  // Identificador único para cada profesor
            $table->string('nombre');  // Nombre del profesor, tipo string en lugar de bigInteger
            $table->string('apellido');  // Apellido del profesor, tipo string
            $table->string('tipo_id');  // Tipo de documento, debe ser string para el tipo de ID
            $table->string('programa');  // Programa del profesor, tipo string en lugar de bigInteger
            $table->integer('edad');  // Edad del profesor, tipo integer
            $table->date('fecha_nacimiento');  // Fecha de nacimiento, tipo date en lugar de integer
            $table->string('tipo_sangre');  // Tipo de sangre, tipo string
            $table->bigInteger('tipo_vinculacion_id')->unsigned();  // Relación con la tabla de "tipo_vinculacion"
            $table->bigInteger('salario_mensual_id')->unsigned();  // Relación con la tabla de "salario_mensual"
            $table->timestamps();  // Gestión automática de las fechas de creación y actualización

            // Definición de claves foráneas
            $table->foreign('tipo_vinculacion_id')->references('id')->on('nomina')->onDelete('cascade');
            $table->foreign('salario_mensual_id')->references('id')->on('nomina')->onDelete('cascade');
        });
    }

    /**
     * Revertir la migración.
     *
     * @return void
     */
    public function down(): void
    {
        // Eliminar la tabla 'profesores' si existe
        Schema::dropIfExists('profesores');
    }
};

