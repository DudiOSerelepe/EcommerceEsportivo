@extends('layouts.admin')

@section('title', 'Categorias')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Categorias</h2>
    <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">+ Nova Categoria</a>
</div>

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

{{-- SweetAlert de erro --}}
@if (session('erro'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Erro!',
    text: "{{ session('erro') }}",
});
</script>
@endif

<div class="card p-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>

                <td>
                    <a href="{{ route('admin.categorias.edit', $categoria->id) }}"
                       class="btn btn-sm btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('admin.categorias.destroy', $categoria->id) }}"
                          method="POST"
                          class="d-inline form-excluir">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                                class="btn btn-sm btn-danger btn-excluir">
                            Excluir
                        </button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Nenhuma categoria encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Script de confirmação SweetAlert --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const botoes = document.querySelectorAll('.btn-excluir');

    botoes.forEach(botao => {
        botao.addEventListener('click', function () {
            let form = this.closest('.form-excluir');

            Swal.fire({
                title: 'Tem certeza?',
                text: "Esta ação não poderá ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

@endsection
