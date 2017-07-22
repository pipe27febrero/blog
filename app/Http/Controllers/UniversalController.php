<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cuenta;
use App\User;
use App\Cliente;
use App\Cuenta_Maestra;
use Session;
use Redirect;

use Illuminate\Support\Facades\Auth;

class UniversalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMaestra(Request $request)
    {

    try{
          Cuenta_Maestra::create([
            'id_cuenta_maestra'=>$request['id_cuenta_maestra'],
            'clave'=>$request['clave'],
            'fecha_caducidad'=>$request['fecha_caducidad'],
            'persona_usa_cuenta'=>$request['persona_usa_cuenta'],
        ]);
        Session::flash('message','Cuenta maestra creada exitosamente');
        return Redirect::to('/agregarmaestra');
        }
        catch(\Exception $e){
          Session::flash('error','Error al agregar cuenta maestra intente nuevamente');
        return Redirect::to('/agregarmaestra');
            }

        
    }




    public function store(Request $request)
    {

        try{
   // try code


          Cuenta::create([
            'id_cuenta'=>$request['id_cuenta'],
            'numero_renovacion'=>$request['numero_renovacion'],
            'telefono_cliente'=>$request['telefono_cliente'],
            'id_cuenta_maestra'=>$request['cuenta_maestra'],
            'precio'=>$request['precio'],
            'estado'=>$request['estado'],
            'fecha_inicio'=>$request['fecha_inicio'],
            'fecha_fin'=>$request['fecha_fin'],
            'correo_usuario'=>$request['correo_usuario'],
            'comentario'=>$request['comentario'],
        ]);
        Session::flash('message','Cuenta de renovacion creada exitosamente');
        return Redirect::to('/');
    }

        catch(\Exception $e){
          Session::flash('message','Error al agregar renovación intente nuevamente');
        return Redirect::to('/agregar');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        if(Auth::user()->tipo=="administrador"){ // SI EL ADMINISTRADOR SOLICITA EL EDITADO

        $Cuenta= Cuenta::where('id_cuenta', '=', $id)->get();
        $Cliente= Cliente::where('telefono','=',$Cuenta[0]->telefono_cliente)->get();


        if($request->input('telefono_cliente')!=$Cuenta[0]->telefono_cliente){ // si el telefono es diferente
        // agregar nuevo telefono y asegurar integridad de claves
        Cliente::create([
            'telefono'=>$request->input('telefono_cliente'),
            'correo'=>$Cliente[0]->correo,
            'nombre'=>$Cliente[0]->nombre,
            'comentario'=>$Cliente[0]->comentario,
        ]);

        } // fin if

       

      

        // actualiza la tabla cuenta en base al nuevo telefono o al mismo
        Cuenta::where('id_cuenta', '=', $id)->update(['numero_renovacion'=>$request->input('numero_renovacion'),'telefono_cliente'=>$request->input('telefono_cliente'),'id_cuenta_maestra'=>$request->input('id_cuenta_maestra'),'precio'=>$request->input('precio'),'comentario'=>$request->input('comentario'),'estado'=>$request->input('estado'),'fecha_inicio'=>$request->input('fecha_inicio'),'fecha_fin'=>$request->input('fecha_fin')]);


        Session::flash('message','Usuario Editado Correctamente');
        return Redirect::to('/');
        }
        else{
            Session::flash('message','No posee los permisos necesarios para realizar esta acción');
        return Redirect::to('/');

        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
