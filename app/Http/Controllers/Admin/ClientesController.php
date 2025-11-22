<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'nullable|min:8',
            'imagem' => 'nullable|url',
        ]);

        Clientes::create($request->all());

        return redirect()
            ->route('admin.clientes.index')
            ->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);

        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'nullable|min:8',
            'imagem' => 'nullable|url',
        ]);

        $cliente->update($request->all());

        return redirect()
            ->route('admin.clientes.index')
            ->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Clientes::destroy($id);

        return redirect()
            ->route('admin.clientes.index')
            ->with('sucesso', 'Cliente removido com sucesso!');
    }
}
