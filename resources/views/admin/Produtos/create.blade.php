@extends('layouts.admin')

@section('title', 'Cadastrar Produto')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Cadastrar Produto</h2>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- SweetAlert de sucesso --}}
@if (session('sucesso'))
<script>
    Swal.fire({
        icon: "success",
        title: "{{ session('sucesso') }}",
        showConfirmButton: false,
        timer: 1800
    });
</script>
@endif

<form action="{{ route('admin.produtos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required value="{{ old('nome') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" required value="{{ old('preco') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Estoque</label>
        <input type="number" name="estoque" class="form-control" required value="{{ old('estoque') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            <option value="">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">URL da Imagem</label>
        <input type="url" name="imagem" class="form-control" placeholder="https://..." value="{{ old('imagem') }}">
        <div class="form-text">Links grandes são aceitos sem problemas.</div>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('admin.produtos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
