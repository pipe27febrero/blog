<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuentaMaestra extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('cuenta_maestras', function (Blueprint $table) {
            $table->string('id_cuenta_maestra');
             $table->primary('id_cuenta_maestra');
            $table->string('clave');     
            $table->dateTime('fecha_caducidad');
            $table->string('persona_usa_cuenta');
       
 
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
