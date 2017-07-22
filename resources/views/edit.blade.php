@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                 @if (Auth::user()->tipo  === "administrador")
                <div class="panel-heading">Panel de administración</div>

                    @endif

                 @if (Auth::user()->tipo  === "vendedor")
                <div class="panel-heading">Panel de vendedor</div>

                    @endif
                <div class="panel-body">
            

                    @if (Auth::user()->tipo  === "administrador")
                      {!!Form::model($cuentas,['route'=>['universal.update',$cuentas[0]->id_cuenta],'method'=>'PUT'])!!}
                          

                           

                     <table class="table">
                             <thead>
                            <th> id cuenta </th>
                            <th> Numero renovacion</th>
                            <th> Telefono Cliente </th>
                            <th> Cuenta Maestra</th>
                            <th> Modificar </th>
                            
        
    
                             </thead>
                     
                      <tbody>
                    
                    
                      <td> 
                      {!! $cuentas[0]->id_cuenta !!}  </td>
                      <td> {!!Form::text('numero_renovacion',$cuentas[0]->numero_renovacion)!!}</td>
                      <td> {!!Form::text('telefono_cliente',$cuentas[0]->telefono_cliente)!!}</td>
                      <td> 
                      {!! Form::select('id_cuenta_maestra', $maestras) !!} </td>
                      <td>   
                        {!!Form::submit('Editar Datos',['class'=>'btn btn-primary'])!!}
                     </td>
                        
                     </tbody>
                   
                     </table>


                       <table class="table">
                             <thead>
                            <th> Precio </th>
                            <th> Comentario</th>
                            <th> Estado </th>
                            <th> Fecha Inicio </th>
                            <th> Fecha Fin</th>
                            
                            
        
    
                             </thead>
                     
                      <tbody>
                    
                    
                      <td> {!!Form::text('precio',$cuentas[0]->precio)!!}  </td>
                      <td> {!!Form::text('comentario',$cuentas[0]->comentario)!!}</td>
                      <td> {!!Form::text('estado',$cuentas[0]->estado)!!}</td>
                      <td> 
                      {!!Form::text('fecha_inicio',$cuentas[0]->fecha_inicio)!!} </td>
                      <td>   
                        {!!Form::text('fecha_fin',$cuentas[0]->fecha_fin)!!}
                     </td>
                        
                     </tbody>
                   
                     </table>
                   
                      {!! Form::close() !!}
 
                    @endif

                    @if (Auth::user()->tipo  === "vendedor")
                            <table class="table">
                             <thead>
                            <th> id cuenta </th>
                            <th> Numero renovacion</th>
                            <th> Telefono Cliente </th>
                            <th> Cuenta Maestra</th>
                           
        
    
                             </thead>
                     @foreach($cuentas_vendedor as $cuenta_vendedor)
                      <tbody>
                      <td> {{$cuenta_vendedor->id_cuenta}} </td>
                      <td> {{$cuenta_vendedor->numero_renovacion}}</td>
                      <td> {{$cuenta_vendedor->telefono_cliente}}</td>
                      <td> {{$cuenta_vendedor->id_cuenta_maestra}}  </td>
                     </tbody>
                     @endforeach
                     </table> 
                       
                    @endif
                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
