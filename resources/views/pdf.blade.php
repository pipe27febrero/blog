         <h1> Ingresos en efectivo </h1>
            <h2> Total: ${{$dinero}} CLP </h2>

         
          <h1> Listado de Cuentas </h1>
         <table class="table">
                             <thead>
                             <tr>
                            <th> id cuenta </th>
                            <th> Numero renovacion</th>
                            <th> Telefono Cliente </th>
                            <th> Cuenta Maestra</th>
                            <th> Precio</th>
                            <th> Estado </th>
                            <th> Fecha inicio</th>
                            <th> Fecha fin </th>
                      
                              </tr>
                            
                             </thead>
                             
                     @foreach($cuentas as $cuenta)
                      <tbody>
                       <tr>
                      <td> {{$cuenta->id_cuenta}} </td>
                      <td> {{$cuenta->numero_renovacion}}</td>
                      <td> {{$cuenta->telefono_cliente}}</td>
                      <td> {{$cuenta->id_cuenta_maestra}}  </td>
                      <td> {{$cuenta->precio}}  </td>
                      <td> {{$cuenta->estado}}  </td>
                      <td> {{$cuenta->fecha_inicio}}  </td>
                      <td> {{$cuenta->fecha_fin}}  </td>
                        </tr>
                      
                     </tbody>

                     @endforeach
                     </table>


                        