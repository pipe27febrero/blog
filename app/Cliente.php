<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ="clientes";
     protected $fillable =   [
                                'telefono',
                                'correo',
                                'nombre',
                                'comentario'
                            ];
     protected  $primaryKey= "telefono";
}
