<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;


class TareaController extends Controller
{
    public function create(Request $request) { 
         //Validación 
         $request->validate([ 
            'nombre' => 'required|string', 
            'fecha_inicio' => 'required|date', 
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', 
            'asignacion' => 'required|string', 
        ]); 
        Tarea::create($request->all());
        return to_route('mostrar');
    }

    public function delete($id) {
        if (Auth::check()) {
            $tarea = Tarea::find($id);
            $tarea->delete();
        }
        return to_route('mostrar');
    }

} // cierra la clase 
