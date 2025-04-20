<!-- resources/views/users/show.blade.php -->
@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Usuário: {{ $user->name }}</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Criar empresa</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Total de Empresas:</strong> {{ $user->number_empresas }}</p>

            <h3 class="mt-4">Empresas deste usuário:</h3>
            @if($user->empresas->count() > 0)
                <ul class="list-group">
                    @foreach($user->empresas as $empresa)
                        <li class="list-group-item">
                            {{ $empresa->name }} (CNPJ: {{ $empresa->cnpj }})
                            <span class="badge bg-{{ $empresa->size == 'small' ? 'info' : ($empresa->size == 'medium' ? 'warning' : 'danger') }}">
                                {{ ucfirst($empresa->size) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info">Nenhuma empresa cadastrada.</div>
            @endif
        </div>
    </div>
@endsection