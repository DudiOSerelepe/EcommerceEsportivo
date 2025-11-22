@extends('layouts.admin')

@section('title', 'Criar Categoria')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Criar Categoria</h2>

        {{-- SweetAlert para erros de validação --}}
        @if ($errors->any())
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao salvar!',
                html: `{!! implode('<br>', $errors->all()) !!}`
            });
            </script>
        @endif

        {{-- SweetAlert para sucesso --}}
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

        <form action="{{ route('admin.categorias.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome"
                       class="form-control"
                       value="{{ old('nome') }}">
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
