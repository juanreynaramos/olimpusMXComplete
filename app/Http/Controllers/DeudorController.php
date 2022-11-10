<?php

namespace App\Http\Controllers;

use App\Models\Deudor;
use Illuminate\Http\Request;

class DeudorController extends Controller
{
    public function index()
    {
        $deudores = Deudor::orderBy('id','ASC')->get();
        return view('deudores.index',compact('deudores'));
    }

    public function create()
    {
        return view('deudores.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'razonSocial' => 'required|unique:deudors|max:100',
            'rfc' => 'max:30',
            'pais' => 'max:20',
            'ciudad' => 'max:50',
            'poblacion' => 'max:50',
            'codigoPais' => 'max:5',
            'estadoProvincia' => 'max:50',
            'direccion' => 'max:150',
            'cd' => 'max:10',
            'claveCliente' => 'max:20',
            'duns' => 'max:20',
            'giro' => 'max:10',
            'descripcionGiro' => 'max:255',
        ]);
        $deudor = new Deudor;
        $deudor->razonSocial = strtoupper (e($request->razonSocial));
        $deudor->rfc = e($request->rfc);
        $deudor->pais = e($request->pais);
        $deudor->ciudad = e($request->ciudad);
        $deudor->poblacion = e($request->poblacion);
        $deudor->codigoPais = e($request->codigoPais);
        $deudor->estadoProvincia = e($request->estadoProvincia);
        $deudor->direccion = e($request->direccion);
        $deudor->cp = e($request->cp);
        $deudor->claveCliente = e($request->claveCliente);
        $deudor->duns = e($request->duns);
        $deudor->giro = e($request->giro);
        $deudor->descripcionGiro = e($request->descripcionGiro);
        $deudor->save();
        return redirect()->route('deudores.index')->with('info','Agregado correctamente');
    }

    public function show($id)
    {
        $deudor = Deudor::where('id',$id)->firstOrFail();
        return view('deudores.show',compact('deudor'));
    }

    public function edit($id)
    {
        $deudor = Deudor::where('id',$id)->firstOrFail();
        return view('deudores.edit',compact('deudor'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'razonSocial' => 'required|max:100',
            'rfc' => 'max:30',
            'pais' => 'max:20',
            'ciudad' => 'max:50',
            'poblacion' => 'max:50',
            'codigoPais' => 'max:5',
            'estadoProvincia' => 'max:50',
            'direccion' => 'max:150',
            'cd' => 'max:10',
            'claveCliente' => 'max:20',
            'duns' => 'max:20',
            'giro' => 'max:10',
            'descripcionGiro' => 'max:255',
        ]);
        $deudor = Deudor::findOrFail($id);
        $deudor->razonSocial = strtoupper (e($request->razonSocial));
        $deudor->rfc = e($request->rfc);
        $deudor->pais = e($request->pais);
        $deudor->ciudad = e($request->ciudad);
        $deudor->poblacion = e($request->poblacion);
        $deudor->codigoPais = e($request->codigoPais);
        $deudor->estadoProvincia = e($request->estadoProvincia);
        $deudor->direccion = e($request->direccion);
        $deudor->cp = e($request->cp);
        $deudor->claveCliente = e($request->claveCliente);
        $deudor->duns = e($request->duns);
        $deudor->giro = e($request->giro);
        $deudor->descripcionGiro = e($request->descripcionGiro);
        $deudor->save();
        return redirect()->route('deudores.index')->with('info','Actualizado correctamente');
    }

    public function destroy($id)
    {
        $deudor =  Deudor::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
