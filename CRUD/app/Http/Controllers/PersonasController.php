<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonasController extends Controller
{
    public function index()
    {
        $datos = Personas::all();
        return view('welcome', compact('datos'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtnombre' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:15',
            'txtapellido' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:15',
            'txtcorreo' => 'required|email|unique:personas,correo|max:30',
            'txttelefono' => 'required|digits:10|unique:personas,telefono',
        ],[
            'txtnombre.required' => 'El nombre es obligatorio.',
            'txtapellido.required' => 'El apellido es obligatorio.',
            'txtcorreo.required' => 'El correo es obligatorio.',
            'txtcorreo.email' => 'El campo correo debe ser una dirección de correo electrónico válida.',
            'txttelefono.required' => 'El teléfono es obligatorio.',
            'txtnombre.regex' => 'El nombre solo puede contener letras.',
            'txtapellido.regex' => 'El apellido solo puede contener letras.',
            'txtcorreo.unique' => 'El correo electrónico ya está registrado.',
            'txttelefono.digits' => 'El teléfono debe tener exactamente :digits dígitos.',
            'txttelefono.unique' => 'El teléfono ya está registrado.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $persona = new Personas();
        $persona->nombre = $request->txtnombre;
        $persona->apellido = $request->txtapellido;
        $persona->correo = $request->txtcorreo;
        $persona->telefono = $request->txttelefono;

        $persona->save();

        Session::flash('success', 'Persona creada exitosamente.');

        return redirect()->route('personas.index');
    }

    public function update(Request $request, Personas $persona)
    {
        $validator = Validator::make($request->all(), [
            'txtnombre' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:15',
            'txtapellido' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:15',
            'txtcorreo' => 'required|email|max:30|unique:personas,correo,' . $persona->id,
            'txttelefono' => 'required|digits:10|unique:personas,telefono,' . $persona->id,
        ], [
            'txtnombre.required' => 'El nombre es obligatorio.',
            'txtapellido.required' => 'El apellido es obligatorio.',
            'txtcorreo.required' => 'El correo es obligatorio.',
            'txtcorreo.email' => 'El campo correo debe ser una dirección de correo electrónico válida.',
            'txttelefono.required' => 'El teléfono es obligatorio.',
            'txtnombre.regex' => 'El nombre solo puede contener letras.',
            'txtapellido.regex' => 'El apellido solo puede contener letras.',
            'txtcorreo.unique' => 'El correo electrónico ya está registrado.',
            'txttelefono.digits' => 'El teléfono debe tener exactamente :digits dígitos.',
            'txttelefono.unique' => 'El teléfono ya está registrado.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $persona->nombre = $request->txtnombre;
        $persona->apellido = $request->txtapellido;
        $persona->correo = $request->txtcorreo;
        $persona->telefono = $request->txttelefono;
    
        $persona->save();
    
        Session::flash('success', 'Persona modificada exitosamente.');
    
        return redirect()->route('personas.index');
    }

    public function delete($id)
    {
        $persona = Personas::find($id);

        if (!$persona) {
            Session::flash('error', 'La persona no existe.');
            return redirect()->route('personas.index');
        }

        $persona->delete();

        Session::flash('success', 'Persona eliminada correctamente.');

        return redirect()->route('personas.index');
    }
}
