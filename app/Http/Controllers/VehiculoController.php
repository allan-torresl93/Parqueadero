<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = App\Vehiculo::orderby('id', 'asc')->get();
        $parqueaderos = App\Parqueadero::orderby('cupo', 'asc')->get();
        return view('vehiculo.index', compact('vehiculos', 'parqueaderos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idparqueadero' => 'required',
            'placavehiculo' => 'required'            
        ]);

        App\Vehiculo::create($request->all());      
        
        return redirect()->route('vehiculo.index')
        ->with('exito', 'vehiculo se ha creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = App\Vehiculo::join('parqueaderos', 'vehiculos.idparqueadero', 'parqueaderos.id')
                            ->select('vehiculos.*', 'parqueaderos.cupo as parqueadero')
                            ->where('vehiculos.id', $id)
                            ->first();        

        return view('vehiculo.view', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = App\Vehiculo::findorfail($id);
        $parqueaderos = App\Parqueadero::orderby('cupo', 'asc')->get();

        return view('vehiculo.edit', compact('vehiculo', 'parqueaderos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idparqueadero' => 'required',
            'placavehiculo' => 'required',            
        ]);

        $vehiculo = App\Vehiculo::findorfail($id);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculo.index')
                ->with('exito', 'se modifico el vehiculo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = App\Vehiculo::findorfail($id);

        $vehiculo->delete();

        return redirect()->route('vehiculo.index')
                ->with('exito', 'se elimino el vehiculo con exito');
    }
}
