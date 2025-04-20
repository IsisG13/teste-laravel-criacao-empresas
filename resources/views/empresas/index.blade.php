@extends('layouts.app')

@section('title', 'Lista de Empresas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="btn btn-primary">Nova Empresa</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Tamanho</th>
                <th>Proprietário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->name }}</td>
                    <td>{{ $empresa->cnpj }}</td>
                    <td>
                        <span class="badge bg-{{ $empresa->size == 'small' ? 'info' : ($empresa->size == 'medium' ? 'warning' : 'danger') }}">
                            {{ ucfirst($empresa->size) }}
                        </span>
                    </td>
                    <td>{{ $empresa->user->name }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhuma empresa cadastrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection