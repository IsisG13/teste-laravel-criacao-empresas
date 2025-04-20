@extends('layouts.app')

@section('title', 'Detalhes da Empresa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Empresa: {{ $empresa->name }}</h1>
        <div>
            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $empresa->id }}</p>
            <p><strong>Nome:</strong> {{ $empresa->name }}</p>
            <p><strong>CNPJ:</strong> {{ $empresa->cnpj }}</p>
            <p><strong>Porte:</strong>
                <span class="badge bg-{{ $empresa->size == 'small' ? 'info' : ($empresa->size == 'medium' ? 'warning' : 'danger') }}">
                    {{ ucfirst($empresa->size) }}
                </span>
            </p>
            <p><strong>Proprietário:</strong> {{ $empresa->user->name }}</p>
            <p><strong>Email do Proprietário:</strong> {{ $empresa->user->email }}</p>
            <p><strong>Criado em:</strong> {{ $empresa->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection