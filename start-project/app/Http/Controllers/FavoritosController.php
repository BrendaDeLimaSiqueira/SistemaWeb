<?php

namespace App\Http\Controllers;
use App\Models\Favorito;

use Illuminate\Http\Request;

class FavoritosController extends Controller {
    
    public function index() {

        $dados = Favorito::all();
        return view('favorito.index', compact('dados'));
    }

    public function create() {
        return view('favorito.create');
    }

    public function store(Request $request) {
        
        Favorito::create([
            'rua' => mb_strtoupper($request->rua, 'UTF-8'),
            'numero' => $request->numero,
            'cep' => $request->cep,
        ]);
        
        return redirect()->route('favorito.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Favorito::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('favorito.edit', compact('dados'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Favorito::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'rua' => mb_strtoupper($request->rua, 'UTF-8'),
            'numero' => $request->numero,
            'cep' => $request->cep,
        ]);

        $obj->save();

        return redirect()->route('favorito.index');
    }

    public function destroy($id) {
        
        $obj = Favorito::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy();

        return redirect()->route('favorito.index');
    }
}
