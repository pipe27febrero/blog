<?php

namespace App\Http\Controllers;
use App\Cuenta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Cuenta_Maestra;
use Session;
use Redirect;
use DateTime;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $cuentas = Cuenta::All();
         $cuentas_vendedor= Cuenta::where('correo_usuario', '=', Auth::user()->email)->get();
         
       
         return view('home',compact(['cuentas','cuentas_vendedor']));
    }

     public function destroy($id_cuenta)
    {

        if(Auth::user()->tipo=="administrador"){
        $cuenta_a_eliminar= Cuenta::where('id_cuenta', '=', $id_cuenta)->get();
        Cuenta::where('id_cuenta', '=', $cuenta_a_eliminar[0]->id_cuenta)->delete();

        Session::flash('message','Eliminacion Exitosa');
        return Redirect::to('/');

        }
        else{
            echo "Usted no esta autorizado para realizar esta acción";
        }
     
        
    }




    public function modificar($id_cuenta){

        if(Auth::user()->tipo=="administrador" || Auth::user()->tipo=="vendedor" ){
        $cuentas= Cuenta::where('id_cuenta', '=', $id_cuenta)->get();
       $maestras_inicial=Cuenta_Maestra::all(['id_cuenta_maestra']);
       // asignar un value para poder enviarlo por post
       for($i=0;$i<sizeof($maestras_inicial);$i++){
       	$maestras[$maestras_inicial[$i]->id_cuenta_maestra]=$maestras_inicial[$i]->id_cuenta_maestra;
       }
          return view('edit',compact(['cuentas','maestras']));
       
        }
        else{
            echo "Usted no esta autorizado para realizar esta acción";
        }
     
    }

    public function update($id)
	{
		return $id;
	
		
	}

	public function agregar(){
		return view('agregar');
	}

	public function agregarMaestra(){
		$maestras=Cuenta_Maestra::all();
		return view('agregarmaestra',compact('maestras'));
	}

	public function pdf(){
	     $cuentas = Cuenta::All();
	     // calculo de dinero en efectivo que ingreso hasta la fecha
	     $dinero=0;
	     for($i=0;$i<sizeof($cuentas);$i++){
	     	$dinero=$cuentas[$i]->precio+$dinero;
	     }
		$pdf = PDF::loadView('pdf',compact(['cuentas','dinero']));
		return $pdf->download('invoice.pdf');

	}
}
