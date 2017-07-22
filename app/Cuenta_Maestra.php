<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta_Maestra extends Model
{
    protected $table ="cuenta_maestras";
      protected $fillable =   [
                                'id_cuenta_maestra',
                                'clave',
                                'fecha_caducidad',
                                'persona_usa_cuenta'
                            ];
     
}
