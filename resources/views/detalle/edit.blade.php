@extends('layouts.app', ['activePage' => 'Hora', 'titlePage' => __('hora')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('detalle.update', $detalle->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="hora_entrada" id="input-name" type="TIME" placeholder="{{ __('Hora') }}" value="" required="true" aria-required="true"/>
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
    </div>
  </div>
@endsection