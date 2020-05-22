@extends('layouts.app', ['activePage' => 'Hora', 'titlePage' => __('hora')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('detalle.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:blue"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Agregar marca del vehiculo') }}</h4>
                <p class="card-category">{{ __('Digite la placa del vehiculo') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Hora de entrada') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="hora_entrada" id="input-name" type="TIME" placeholder="{{ __('Hora de entrada') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Asignar Placa') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idVehiculo" type="text" value="" required="true">
                        <option value="" disabled selected>Placa</option>
                        @foreach ($vehiculos as $vehiculo)
                            <option value="{{$vehiculo->id}}">{{$vehiculo->placa_vehiculo}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Asignar Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idCliente" type="text" value="" required="true">
                        <option value="" disabled selected>Nombre</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row"> 
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-success">
                  <h4 class="card-title mt-0"> Cupos del parqueadero</h4>
                  <p class="card-category"> Cupos disponibles y ocupados del parqueadero</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          ID del cupo
                        </th>
                        <th>
                          ID del cliente
                        </th>
                        <th>
                          Hora de ingreso
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($detalles as $detalle)
                        <tr>
                          <td>{{$detalle -> idVehiculo}}</td>
                          <td>{{$detalle -> idCliente}}</td>                                                     
                          <td>{{$detalle -> hora_entrada}}</td>                          
                          <td>
                            <form action="{{route('detalle.destroy', $detalle->id)}}" method="post">
                              <a href="{{route('detalle.show', $detalle->id)}}" class="btn btn-info">Ver</a>
                              <a href="{{route('detalle.edit', $detalle->id)}}" class="btn btn-primary">Editar</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection