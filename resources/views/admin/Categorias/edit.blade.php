@extends('layouts.admin')

@section('title', 'Editar Categoria')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Editar Categoria</h2>

        {{-- Erros de validação usando SweetAlert --}}
        @if ($errors->any())
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao atualizar!',
                html: `{!! implode('<br>', $errors->all()) !!}`
            });
            </script>
        @endif

        {{-- SweetAlert de sucesso --}}
        @if (session('sucesso'))
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "{{ session('sucesso') }}",
                timer: 2500,
                showConfirmButton: false
            });
            </script>
        @endif

        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome"
                    class="form-control"
                    value="{{ old('nome', $categoria->nome) }}">
            </div>

            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
