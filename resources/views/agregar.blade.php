@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   {{Session::get('message')}}
   




</div>

@endif
            <div class="panel panel-default">
                 @if (Auth::user()->tipo  === "administrador")
                <div class="panel-heading">Panel de administración</div>
                       {!!Form::open(['route'=>'universal.store','method'=>'POST'])!!}
                       <table class="table">
                             <thead>
                            <th> Atributo </th>
                            <th> Campo</th>
                            
                            
        
    
                             </thead>
                     
                      <tbody>
                    
                    
                      <td> Id de cuenta </td>
                      <td>  {!!Form::text('id_cuenta')!!} </td>

                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Numero renovacion </td>
                      <td>  {!!Form::text('numero_renovacion')!!} </td>
                     
                        
                     </tbody>
                     <tbody>
                    
                    
                      <td> Correo Usuario Vendedor </td>
                      <td>  {!!Form::text('correo_usuario')!!} </td>
                     
                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Telefono Cliente </td>
                      <td>  {!!Form::text('telefono_cliente')!!} </td>
                     
                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Cuenta Maestra </td>
                      <td>  {!!Form::text('cuenta_maestra')!!} </td>
                     
                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Precio </td>
                      <td>  {!!Form::text('precio')!!} </td>
                     
                        
                     </tbody>

                     <tbody>
                    
                    
                      <td> Estado </td>
                      <td>  {!!Form::text('estado')!!} </td>
                     
                        
                     </tbody>

                     <tbody>
                    
                    
                      <td> Fecha Inicio </td>
                      <td>  {!!Form::text('fecha_inicio')!!} </td>
                     
                        
                     </tbody>

                      <tbody>
                    
                    
                      <td> Fecha Fin </td>
                      <td>  {!!Form::text('fecha_fin')!!} </td>
                     
                        
                     </tbody>

                     <tbody>
                    
                    
                      <td> Comentario </td>
                      <td>  {!!Form::text('comentario')!!} </td>
                     
                        
                     </tbody>


                     <tbody>
                    
                    
                      <td>  </td>
                      <td> {!!Form::submit('Agregar',['class'=>'btn btn-primary'])!!}   </td>
                     
                        
                     </tbody>


                   
                     </table>
                      {!!Form::close()!!}

                    
                    @endif

                 @if (Auth::user()->tipo  === "vendedor")
                <div class="panel-heading">Panel de vendedor</div>

                    @endif
                <div class="panel-body">
            

                    @if (Auth::user()->tipo  === "administrador")

               
                   
                    @endif

                    @if (Auth::user()->tipo  === "vendedor")
                           
                       
                    @endif
                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
