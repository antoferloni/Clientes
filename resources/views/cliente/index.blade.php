<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe59c386a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>

    <h1 class="text-center p-3" > Registro de Usuarios</h1>

    @if(session("Correcto"))
    <div class="alert alert-success" > {{session("Correcto")}} </div>
    @endif
    @if(session("Incorrecto"))
    <div class="alert alert-danger" > {{session("Incorrecto")}} </div>
    @endif
     <!-- Modal para Registrar usuarios -->
      <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                             <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro del Usuario</h1>
                              </div>
                     <div class="modal-body">
                         <form action="{{route('cliente.create')}}" method="post">
                            @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">id</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="txtNombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ruc</label>
                                    <input type="number" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="txtRuc" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                                    <input type="tel" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" name="txtTelefono" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp" name="txtDireccion" required>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="txtActivo">
                                <label class="form-check-label" for="flexCheckDefault">Activo</label>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </form>
                     </div>
                </div>
          </div>
      </div>

      <div class="p-5 table-responsive">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar" >Añadir Usuario</button>
    
    <table class="table table-striped table-bordered ">
    <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>RUC</th>
            <th>TELEFONO</th>
            <th>DIRECCION</th>
            <th>ACTIVO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($datos as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->ruc}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>
                @if($cliente->activo == 1)
                    Activo
                @else
                    Inactivo
                @endif
            </td>
            <td>
                 <a href=""  data-bs-toggle="modal" data-bs-target="#modalEditar{{$cliente->id}}" class="btn btn-warning btn-sm" >
                    <i class="fa-solid fa-pen-to-square"></i></a>
                 @if($cliente->activo==1)
                 <button class="btn btn-danger btn-sm" onclick="showAlert()"> 
                    <i class="fa-solid fa-trash"></i>
                </button>
                 @else
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete('{{route('cliente.destroy', $cliente->id)}}')">
                     <i class="fa-solid fa-trash"></i></a>
                @endif
            </td>


            <!-- Modal para modificar usuarios -->
                <div class="modal fade" id="modalEditar{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                             <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del Usuario</h1>
                              </div>
                        <div class="modal-body">
                            <form action="{{route('cliente.update')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">id</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" value="{{$cliente->id}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="txtNombre"  value="{{$cliente->nombre}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ruc</label>
                                    <input type="number" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="txtRuc"  value="{{$cliente->ruc}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                                    <input type="tel" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" name="txtTelefono"  value="{{$cliente->telefono}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp" name="txtDireccion"  value="{{$cliente->direccion}}" required>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="txtActivo" value="1" {{ $cliente->activo == 1 ? 'checked' : '' }} >
                                    <label class="form-check-label" for="flexCheckDefault">Activo</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </tr>
        @endforeach
    </tbody>
  </table>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

  </body>
</html>



