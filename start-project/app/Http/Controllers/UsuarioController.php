<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller {
    
    public function index() {

        $dados = Usuario::all();
        return view('usuario.index', compact('dados'));
    }

    public function create() {
        return view('usuario.create');
    }

    public function store(Request $request) {
        
        Usuario::create([
            'id' => mb_strtoupper($request->id, 'UTF-8'),
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,

        ]);
        
        return redirect()->route('usuario.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Usuario::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('Usuario.edit', compact('dados'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Produto::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'id' => mb_strtoupper($request->id, 'UTF-8'),
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,

        ]);

        $obj->save();

        return redirect()->route('usuario.index');
    }

    public function destroy($id) {
        
        $obj = Usuario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy();

        return redirect()->route('usuario.index');
    }
}
