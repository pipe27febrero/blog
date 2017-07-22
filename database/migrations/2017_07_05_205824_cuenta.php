<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
         $table->string('id_cuenta');
         $table->string('numero_renovacion');
         $table->primary(array('id_cuenta', 'numero_renovacion'));
         $table->string('correo_usuario');
         $table->string('telefono_cliente');
         $table->string('id_cuenta_maestra');
         
          $table->foreign('correo_usuario')->references('email')->on('users');
         $table->foreign('telefono_cliente')->references('telefono')->on('clientes');
         $table->foreign('id_cuenta_maestra')->references('id_cuenta_maestra')->on('cuenta_maestras');
        

         $table->dateTime('fecha_inicio');
         $table->dateTime('fecha_fin');
         $table->string('estado');
         $table->string('comentario');
         $table->integer('precio');
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
        //
    }
}
