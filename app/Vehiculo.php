<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = ['placa_vehiculo', 'idParqueadero'];
}
