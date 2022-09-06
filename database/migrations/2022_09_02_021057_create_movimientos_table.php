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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('valor')->default(0);
            $table->smallInteger('tipo')->default(0);
            $table->string('descripcion');
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
};
