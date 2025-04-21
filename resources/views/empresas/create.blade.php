@extends('layouts.app')

@section('title', 'Criar Empresa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="fas fa-plus-circle me-2"></i>Criar Nova Empresa
        </h1>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('empresas.store') }}" method="POST">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome da Empresa *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="cnpj" class="form-label">CNPJ *</label>
                        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" maxlength="14" required>
                        @error('cnpj')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="size" class="form-label">Porte da Empresa *</label>
                        <select class="form-select @error('size') is-invalid @enderror" id="size" name="size" required>
                            <option value="" disabled selected>Selecione o porte</option>
                            <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Pequena</option>
                            <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Média</option>
                            <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Grande</option>
                        </select>
                        @error('size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="user_id" class="form-label">Proprietário *</label>
                        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Selecione o proprietário</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-undo me-1"></i> Limpar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Salvar Empresa
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            border: 1px solid #e9ecef;
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .invalid-feedback {
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                gap: 1rem;
            }

            .col-md-6 {
                width: 100%;
            }

            .d-md-flex {
                flex-direction: column;
                gap: 0.5rem;
            }

            .me-md-2 {
                margin-right: 0 !important;
                margin-bottom: 0.5rem;
            }
        }
    </style>
@endsection

@push('scripts')
<script>
    document.getElementById('cnpj').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = value;
    });
</script>
@endpush