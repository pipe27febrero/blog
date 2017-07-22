@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   {{Session::get('message')}}
   




</div>

@endif
            <div class="panel panel-default">
                 @if (Auth::user()->tipo  === "administrador")
                <div class="panel-heading">Panel de administración</div>
                    <table class="table">
                     <thead>
                            <th> 
                     {!!Form::open(['route'=>'agregar','method'=>'GET'])!!}
                       {!!Form::submit('Agregar Renovacion',['class'=>'btn btn-success'])!!}
                        {!!Form::close()!!} </th>

                        <th>

                        {!!Form::open(['route'=>'agregarmaestra','method'=>'GET'])!!}
                       {!!Form::submit('Agregar Cuenta Maestra',['class'=>'btn btn-success'])!!}
                        {!!Form::close()!!}
                        </th>

                        <th>

                        {!!Form::open(['route'=>'agregar','method'=>'GET'])!!}
                       {!!Form::submit('Agregar Cliente',['class'=>'btn btn-success'])!!}
                        {!!Form::close()!!}
                        </th>

                         <th>

                        {!!Form::open(['route'=>'agregar','method'=>'GET'])!!}
                       {!!Form::submit('Permisos',['class'=>'btn btn-primary'])!!}
                        {!!Form::close()!!}
                        </th>

                           <th>

                        {!!Form::open(['route'=>'pdf','method'=>'GET'])!!}
                       {!!Form::submit('Reporte PDF',['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}
                        </th>

                        </table>

                    @endif

                 @if (Auth::user()->tipo  === "vendedor")
                <div class="panel-heading">Panel de vendedor</div>

                    @endif
                <div class="panel-body">
            

                    @if (Auth::user()->tipo  === "administrador")

                     <table class="table">
                             <thead>
                            <th> id cuenta </th>
                            <th> Numero renovacion</th>
                            <th> Telefono Cliente </th>
                            <th> Cuenta Maestra</th>
                            <th> Precio</th>
                            <th> Estado </th>
                            <th> Fecha inicio</th>
                            <th> Fecha fin </th>
                            <th> Eliminar </th>
                            <th> Modificar </th>
        
    
                             </thead>
                     @foreach($cuentas as $cuenta)
                      <tbody>
                      <td> {{$cuenta->id_cuenta}} </td>
                      <td> {{$cuenta->numero_renovacion}}</td>
                      <td> {{$cuenta->telefono_cliente}}</td>
                      <td> {{$cuenta->id_cuenta_maestra}}  </td>
                      <td> {{$cuenta->precio}}  </td>
                      <td> {{$cuenta->estado}}  </td>
                      <td> {{$cuenta->fecha_inicio}}  </td>
                      <td> {{$cuenta->fecha_fin}}  </td>
                      <td>   {!!Form::open(['route'=>['destroy',$cuenta->id_cuenta],'method'=>'GET'])!!}

  


                       {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!} </td>
                        <td> 
                            {!!link_to_route('modificar', $title = 'Editar', $parameters = $cuenta->id_cuenta, $attributes = ['class'=>'btn btn-primary'])!!} 
                        </td>
                     </tbody>
                     @endforeach
                     </table>
                        
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
