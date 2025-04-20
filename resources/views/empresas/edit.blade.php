@extends('layouts.app')

@section('title', 'Editar Empresa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Empresa: {{ $empresa->name }}</h1>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome da Empresa</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $empresa->name }}" required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $empresa->cnpj }}" maxlength="14" required>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Porte da Empresa</label>
            <select class="form-select" id="size" name="size" required>
                <option value="small" {{ $empresa->size == 'small' ? 'selected' : '' }}>Pequena</option>
                <option value="medium" {{ $empresa->size == 'medium' ? 'selected' : '' }}>Média</option>
                <option value="large" {{ $empresa->size == 'large' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Proprietário</label>
            <select class="form-select" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $empresa->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection