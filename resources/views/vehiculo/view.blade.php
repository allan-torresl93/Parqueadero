@extends('layouts.app', ['activePage' => 'vehiculos', 'titlePage' => __('vehiculo')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Vehiculo</h4>
                        <p class="card-category"> Información del vehiculo selccionado</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Placa del movil
                                    </th>
                                    <th>
                                        Puesto asignado
                                    </th>
                                    
                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$vehiculo->id}}</td>
                                        <td>{{$vehiculo->placa_vehiculo}}</td>                                       
                                        <td>{{$vehiculo->parqueadero}}</td>                                        
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('vehiculo.index')}}"><button class="btn btn-info">Atras</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection