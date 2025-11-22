<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::with('categoria')->get();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url'
        ]);

        Produtos::create($request->all());

        return redirect()
            ->route('admin.produtos.index')
            ->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produtos::findOrFail($id);
        $categorias = Categorias::all();

        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|url'
        ]);

        $produto->update($request->all());

        return redirect()
            ->route('admin.produtos.index')
            ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Produtos::destroy($id);

        return redirect()
            ->route('admin.produtos.index')
            ->with('sucesso', 'Produto removido com sucesso!');
    }
}
