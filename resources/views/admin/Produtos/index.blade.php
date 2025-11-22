@extends('layouts.admin')

@section('title', 'Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Produtos</h2>
    <a href="{{ route('admin.produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

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

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th width="150">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>

            <td>
                @if ($produto->imagem)
                    <img src="{{ $produto->imagem }}" width="55" height="55" style="object-fit: cover;" class="rounded">
                @else
                    <span class="text-muted">Sem imagem</span>
                @endif
            </td>

            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->categoria->nome }}</td>
            <td>{{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->estoque }}</td>

            <td>
                <a href="{{ route('admin.produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('admin.produtos.destroy', $produto->id) }}"
                      method="POST"
                      class="d-inline form-excluir-produto">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Nenhum produto cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script>
document.querySelectorAll('.form-excluir-produto').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Excluir?",
            text: "Esta ação não pode ser desfeita",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sim, excluir!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
