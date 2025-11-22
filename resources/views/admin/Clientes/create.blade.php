@extends('layouts.admin')

@section('title', 'Cadastrar Cliente')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Cadastrar Cliente</h2>
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

<form action="{{ route('admin.clientes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required value="{{ old('nome') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">URL da Imagem (Foto do Cliente)</label>
        <input type="url" name="imagem" class="form-control" placeholder="https://..." value="{{ old('imagem') }}">
        <div class="form-text">Aceita links grandes de imagem.</div>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
