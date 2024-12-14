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
    public function up(): void
    {
        Schema::create('nomina', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');  // Identificador único para cada entrada de nómina
            $table->bigInteger('profesor_id')->unsigned();  // Relación con la tabla de 'profesores'
            $table->bigInteger('tipo_vinculacion')->unsigned();  // Relación con el tipo de vinculación
            $table->bigInteger('salario')->unsigned();  // Salario del profesor
            $table->timestamps();  // Registra las fechas de creación y actualización

            // Definir claves foráneas
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            // La tabla de 'tipo_vinculacion' debería existir, si tiene una tabla específica
            $table->foreign('tipo_vinculacion')->references('id')->on('profesores')->onDelete('cascade');
            // Si 'salario' hace referencia a una tabla específica, define su clave foránea aquí
            $table->foreign('salario')->references('id')->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Revertir la migración.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('nomina', function (Blueprint $table) {
            // Eliminar claves foráneas
            $table->dropForeign(['profesor_id']);
            $table->dropForeign(['tipo_vinculacion']);
            $table->dropForeign(['salario']);

            // Eliminar columnas añadidas
            $table->dropColumn(['profesor_id', 'tipo_vinculacion', 'salario']);
        });

        // Eliminar la tabla 'nomina'
        Schema::dropIfExists('nomina');
    }
};

