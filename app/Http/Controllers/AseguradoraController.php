<?php

namespace App\Http\Controllers;

use App\Models\Aseguradora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AseguradoraController extends Controller
{
    public function index()
    {
        $aseguradoras = Aseguradora::orderBy('id','ASC')->paginate(15);
        return view('aseguradoras.index',compact('aseguradoras'));
    }

    public function create()
    {
        return view('aseguradoras.create');
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            'razonSocial' => 'required|unique:aseguradoras|max:100',
            'uri' => 'required|max:200',
        ]);
        $aseguradora = new Aseguradora;
        $aseguradora->razonSocial = e($request->razonSocial);
        $aseguradora->uri = e($request->uri);
        $aseguradora->save();
        return redirect()->route('aseguradoras.index')->with('info','Agregado correctamente');
    }

    public function edit($id)
    {
        $aseguradora = Aseguradora::where('id',$id)->firstOrFail();
        return view('aseguradoras.edit',compact('aseguradora'));
    }

    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(),[
            'razonSocial' => 'required|unique:aseguradoras|max:100',
            'uri' => 'required|max:200',
        ]);
        $aseguradora = Aseguradora::findOrFail($id);
        $aseguradora->razonSocial = e($request->razonSocial);
        $aseguradora->uri = e($request->uri);
        $aseguradora->save();
        return redirect()->route('aseguradoras.index')->with('info','Actualizado correctamente');
    }

    public function destroy($id)
    {
        $aseguradora =  Aseguradora::findOrFail($id)->delete();
        return back()->with('info','Borrado con éxito');
    }
}
