@extends('layouts.admin')

@section('title', 'Editar Cliente')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Editar Cliente</h2>
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

<form action="{{ route('admin.clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required value="{{ old('nome', $cliente->nome) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email', $cliente->email) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">URL da Imagem</label>
        <input type="url" name="imagem" class="form-control" value="{{ old('imagem', $cliente->imagem) }}">
    </div>

    @if ($cliente->imagem)
        <div class="mb-3">
            <label>Foto Atual:</label><br>
            <img src="{{ $cliente->imagem }}" class="rounded-circle" width="80">
        </div>
    @endif

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('admin.clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection

{{-- SweetAlert --}}
@section('scripts')
@if (session('sucesso'))
<script>
    Swal.fire({
        icon: "success",
        title: "{{ session('sucesso') }}",
        showConfirmButton: false,
        timer: 1800
    })
</script>
@endif
@endsection
