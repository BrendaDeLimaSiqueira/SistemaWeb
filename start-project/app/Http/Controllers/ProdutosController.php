<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller {
    
    public function index() {

        $dados = Produto::all();
        return view('produto.index', compact('dados'));
    }

    public function create() {
        return view('produto.create');
    }

    public function store(Request $request) {
        
        Produto::create([
            'id' => mb_strtoupper($request->id, 'UTF-8'),
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,

        ]);
        
        return redirect()->route('produto.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Endereco::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('enderecos.edit', compact('dados'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Produto::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'rua' => mb_strtoupper($request->rua, 'UTF-8'),
            'numero' => $request->numero,
            'cep' => $request->cep,
        ]);

        $obj->save();

        return redirect()->route('produto.index');
    }

    public function destroy($id) {
        
        $obj = Produto::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy();

        return redirect()->route('produto.index');
    }
}
