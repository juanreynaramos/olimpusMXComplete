<?php

namespace App\Http\Controllers;

use App\Models\Asegurado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AseguradoController extends Controller
{
    public function index()
    {
        $asegurados = Asegurado::orderBy('id','ASC')->get();
        $aseguradosRZ = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('asegurados.index',compact('asegurados','aseguradosRZ'));
    }

    public function razonSocial(Request $request)
    {
        $asegurados = Asegurado::where('id',$request->razonSocial)->orderBy('id','ASC')->paginate(20);
        $aseguradosRZ = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('asegurados.index',compact('asegurados','aseguradosRZ'));
    }

    public function create()
    {
        return view('asegurados.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'razonSocial' => 'required|unique:asegurados|max:100',
            'direccion' => 'max:200',
            'rfc' => 'max:20',
            'email' => 'max:50',
            'email2' => 'max:50',
            'email3' => 'max:50',
            'email4' => 'max:50',
            'valorSaldoEstimadoPromedio' => 'required|numeric',
        ]);
        $asegurado = new Asegurado;
        $asegurado->razonSocial = strtoupper (e($request->razonSocial));
        $asegurado->direccion = e($request->direccion);
        $asegurado->rfc = e($request->rfc);
        $asegurado->email = e($request->email);
        $asegurado->email2 = e($request->email2);
        $asegurado->email3 = e($request->email3);
        $asegurado->email4 = e($request->email4);
        $asegurado->valorSaldoEstimadoPromedio = e($request->valorSaldoEstimadoPromedio);
        $asegurado->save();
        return redirect()->route('asegurados.index')->with('info','Agregado correctamente');
    }
    
    public function show($id)
    {
        $asegurado = Asegurado::where('id',$id)->firstOrFail();
        return view('asegurados.show',compact('asegurado'));
    }

    public function edit($id)
    {
        $asegurado = Asegurado::where('id',$id)->firstOrFail();
        return view('asegurados.edit',compact('asegurado'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'razonSocial' => 'required|max:100',
            'direccion' => 'max:200',
            'rfc' => 'max:20',
            'email' => 'max:80',
            'email2' => 'max:80',
            'email3' => 'max:80',
            'email4' => 'max:80',
            'valorSaldoEstimadoPromedio' => 'required|numeric',
        ]);
        $asegurado = Asegurado::findOrFail($id);
        $asegurado->razonSocial = e($request->razonSocial);
        $asegurado->direccion = e($request->direccion);
        $asegurado->rfc = e($request->rfc);
        $asegurado->email = e($request->email);
        $asegurado->email2 = e($request->email2);
        $asegurado->email3 = e($request->email3);
        $asegurado->email4 = e($request->email4);
        $asegurado->valorSaldoEstimadoPromedio = e($request->valorSaldoEstimadoPromedio);
        $asegurado->save();
        return redirect()->route('asegurados.index')->with('info','Actualizado correctamente');
    }
    //Mario Saucedo Las Noches las Hago Dias Letra

    public function destroy($id)
    {
        $asegurado =  Asegurado::findOrFail($id)->delete();
        $asegurados = Asegurado::orderBy('id','ASC')->paginate(20);
        $aseguradosRZ = Asegurado::orderBy('razonSocial','ASC')->get();
        return view('asegurados.index',compact('asegurados','aseguradosRZ'))->with('info','Borrado con éxito');
    }
}
