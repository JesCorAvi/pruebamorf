<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImagenController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("imagenes.index", ["imagenes" =>Imagen::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("imagenes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|mimes:jpg,png,jpeg|max:800',
        ]);

        $image = $request->file('url');
        $nombre = hash('sha256', time() . $image->getClientOriginalName()) . ".png";
        $image->storeAs('uploads/imagenes', $nombre, 'public');

        $manager = new ImageManager(new Driver());
        $imageR = $manager->read(Storage::disk('public')->get('uploads/imagenes/' . $nombre));
        $imageR->scaleDown(200); //cambiar esto para ajustar el reescalado de la imagen
        $rute = Storage::path('public/uploads/imagenes/' . $nombre);
        $imageR->save($rute);

        Imagen::create([
            "nombre" => $request->nombre,
            "url" => 'storage/uploads/imagenes/' . $nombre,
        ]);
        return redirect()->route("imagenes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        return view("imagenes.show", ["imagen"=>$imagen]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        //
    }

}
