<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        Categorias::create([
            'nome' => $request->nome
        ]);

        return redirect()
            ->route('admin.categorias.index')
            ->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        $categoria = Categorias::findOrFail($id);
        $categoria->update(['nome' => $request->nome]);

        return redirect()
            ->route('admin.categorias.index')
            ->with('sucesso', 'Categoria atualizada com sucesso!');
    } 

    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('sucesso', 'Categoria excluída com sucesso!');
    }
}
