@extends('layouts.app', ['activePage' => 'Hora', 'titlePage' => __('hora')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Hora</h4>
                        <p class="card-category"> Información de la hora de entrada del vehiculo</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Cupo asignado
                                    </th>
                                    <th>
                                        Nombre del cliente
                                    </th>
                                    <th>
                                        Hora de entrada
                                    </th>
                                    
                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$detalle->id}}</td>
                                        <td>{{$detalle->vehiculo}}</td>                                       
                                        <td>{{$detalle->cliente}}</td>
                                        <td>{{$detalle->horaentrada}}</td>                                       
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('detalle.index')}}"><button class="btn btn-info">Atras</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection