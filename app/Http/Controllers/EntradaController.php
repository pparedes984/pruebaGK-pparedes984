<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::all();
        return view('principal/visualizar', compact('entradas'));
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        
        $entrada = new Entrada($request->all());
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $imagen = $file->getClientOriginalName();
            //\Storage::disk('local')->put($imagen,  \File::get($file));
            $file->move(public_path("/img/"),$imagen);
            $entrada->imagen = $imagen;
            
        }
        $entrada->save();
        
        return redirect()->route('entradas.index')
            ->with('success', 'Entrada almacenda exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $entrada_id)
    {
        $entrada = Entrada::find($entrada_id);
        $entrada->titulo = $request->input('titulo');
        $entrada->descripcion = $request->input('descripcion');
        $entrada->save();
        echo json_encode($entrada);
        return view('formulario', compact('entradas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        $entrada = Entrada::find($entrada_id);
        $entrada->delete();
        return view('welcome');
    }
}
