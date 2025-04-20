@extends('layouts.app')

@section('title', 'Criar Empresa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Criar Nova Empresa</h1>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome da Empresa</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="14" required>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Porte da Empresa</label>
            <select class="form-select" id="size" name="size" required>
                <option value="small">Pequena</option>
                <option value="medium">Média</option>
                <option value="large">Grande</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Proprietário</label>
            <select class="form-select" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection