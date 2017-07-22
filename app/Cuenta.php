<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table ="cuentas";
     protected $fillable =   [
                                'id_cuenta',
                                'numero_renovacion',
                                'correo_usuario',
                                'telefono_cliente',
                                'id_cuenta_maestra',
                                'fecha_inicio',
                                'fecha_fin',
                                'estado',
                                'comentario',
                                'precio'
                            ];
   // protected $primaryKey = ['id_cuenta', 'numero_renovacion'];

}
