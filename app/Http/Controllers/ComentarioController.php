<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Imagen;
use App\Models\Publicacion;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view("comentarios.create", ["type" => $request->type, "id" => $request->id,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->type == "publicacion"){
            $objeto = Publicacion::find($request->id);
            $ruta = "publicaciones.index";

        }elseif($request->type == "imagen"){
            $objeto = Imagen::find($request->id);
            $ruta = "imagenes.index";

        }
        $comentario = new Comentario();
        $comentario->comentario = $request->comentario;
        $comentario->url ="nada";
        $objeto->comentarios()->save($comentario);

        return redirect()->route($ruta);

    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
