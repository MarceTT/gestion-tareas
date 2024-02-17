<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTareasRequest;
use App\Models\Tareas;
use App\Http\Resources\TareasResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TareasResource::collection(Tareas::where('user_id', auth()->id())->get());

        //return TareasResource::collection(Tareas::all());
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
    public function store(StoreTareasRequest $request)
    {
        $request->validated($request->all());

        $tarea = Tareas::create([
            'user_id' => $request->user_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'completada' => $request->completada,
            'fecha_creacion' => $request->fecha_creacion,
            'fecha_completada' => $request->fecha_completada
        ]);

        return new TareasResource($tarea);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new TareasResource(Tareas::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $tarea = Tareas::find($id);
        if(Auth::user()->id != $tarea->user_id){
            return response()->json(['message' => 'No tienes permisos para editar esta tarea'], 403);
        }
        $tarea->update($request->all());
        return new TareasResource($tarea);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea = Tareas::find($id);
        if(Auth::user()->id != $tarea->user_id){
            return response()->json(['message' => 'No tienes permisos para eliminar esta tarea'], 403);
        }
        $tarea->delete();
        return response()->json(null, 204);
    }
}
