@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

         


            @if(Session::has('message') || Session::has('error') )

            @if(Session::has('message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   {{Session::get('message')}}
     @endif
     
           @if(Session::has('error'))

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   {{Session::get('error')}}
     @endif
   
   




</div>
  
@endif
            <div class="panel panel-default">
                 @if (Auth::user()->tipo  === "administrador")
                <div class="panel-heading">Agregar Cuentas Maestras- Panel de administrador</div>
                       {!!Form::open(['route'=>'addmaestra','method'=>'POST'])!!}
                       <table class="table">
                             <thead>
                            <th> Atributo </th>
                            <th> Campo</th>
                            
                            
        
    
                             </thead>
                     
                      <tbody>
                    
                    
                      <td> Id de cuenta maestra </td>
                      <td>  {!!Form::text('id_cuenta_maestra')!!} </td>

                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Clave </td>
                      <td>  {!!Form::text('clave')!!} </td>
                     
                        
                     </tbody>
                     <tbody>
                    
                    
                      <td> Fecha de caducidad </td>
                      <td>  {!!Form::text('fecha_caducidad')!!} </td>
                     
                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Persona que utiliza cuenta </td>
                      <td>  {!!Form::text('persona_usa_cuenta')!!} </td>
                     
                        
                     </tbody>

                     <tbody>
                    
                    
                      <td>  </td>
                      <td> {!!Form::submit('Agregar Cuenta Maestra',['class'=>'btn btn-primary'])!!}   </td>
                     
                        
                     </tbody>


                   
                     </table>
                      {!!Form::close()!!}

                    
                    @endif

                 @if (Auth::user()->tipo  === "vendedor")
                <div class="panel-heading">Panel de vendedor</div>

                    @endif
                <div class="panel panel-default">
                      <div class="panel-heading">Listado de cuentas maestras</div>
                         <table class="table">
                             <thead>
                            <th> Id de Cuenta Maestra </th>
                            <th> Clave </th>
                            <th> Fecha de Caducidad </th>
                            <th> Persona que usa la cuenta </th>
                            
                            @foreach($maestras as $maestra)
                      <tbody>
                      <td> {{$maestra->id_cuenta_maestra}} </td>
                      <td> {{$maestra->clave}}</td>
                      <td> {{$maestra->fecha_caducidad}}</td>
                      <td> {{$maestra->persona_usa_cuenta}}  </td>
                     </tbody>
                     @endforeach
                            
                            
        
    
                             </thead>
                        </table>

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
