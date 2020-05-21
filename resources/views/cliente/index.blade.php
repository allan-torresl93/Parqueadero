@extends('layouts.app', ['activePage' => 'Cliente', 'titlePage' => __('cliente')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('cliente.store') }}" autocomplete="off" class="form-horizontal">
            @csrf


            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:#1cc35e"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Agregar Clientes') }}</h4>
                <p class="card-category">{{ __('Digite la información del cliente a crear') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Asignar puesto') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idparqueadero" type="text" value="" required="true">
                        <option value="" disabled selected>Puesto</option>
                        @foreach ($parqueaderos as $parqueadero)
                            <option value="{{$parqueadero->id}}">{{$parqueadero->cupo}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nombre" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Apellido') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apellido" id="input-name" type="text" placeholder="{{ __('Apellido') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Telefono') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="telefono" id="input-name" type="number" placeholder="{{ __('Telefono') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
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
                  <h4 class="card-title mt-0"> Clientes Inscritos</h4>
                  <p class="card-category"> Clientes registrados en el sistema</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          ID del cupo
                        </th>
                        <th>
                          Nombre
                        </th>
                        <th>
                          Apellido
                        </th>
                        <th>
                          Telefono
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                          <td>{{$cliente -> idparqueadero}}</td>
                          <td>{{$cliente -> nombre}}</td>
                          <td>{{$cliente -> apellido}}</td>
                          <td>{{$cliente -> telefono}}</td>
                          <td>
                            <form action="{{route('cliente.destroy', $cliente->id)}}" method="post">
                              <a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-info">Ver</a>
                              <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-primary">Editar</a>
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