<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\alumnos;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = alumnos::all();
        if ($alumnos->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron alumnos'
            ]);
        } else {
            return response()->json($alumnos);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumno = alumnos::create($request->post());
        if (!empty($alumno)) {
            return response()->json([
                'message' => 'Alumno creado correctamente',
                'alumno' => $alumno
            ]);
        }else{
            return response()->json([
                'message' => 'Error al crear el alumno'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = alumnos::find($id);

        if(!$alumno){
            $data = [
                'message' => 'Alumno no encontrado'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Alumno encontrado',
            'alumno' => $alumno
        ];
        return response()->json($data,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $alumno = alumnos::find($id);
        if ($alumno) {
            return response()->json([
                'alumno' => $alumno
            ]);
        } else {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alumno = alumnos::find($id);
        if ($alumno) {
            $alumno->update($request->post());
            return response()->json([
                'message' => 'Alumno actualizado correctamente',
                'alumno' => $alumno
            ]);
        } else {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = alumnos::find($id);
        if ($alumno) {
            $alumno->delete();
            return response()->json([
                'message' => 'Alumno eliminado correctamente'
            ]);
        } else {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ]);
        }
    }
}
