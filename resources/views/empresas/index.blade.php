@extends('layouts.app')

@section('title', 'Lista de Empresas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="fas fa-building me-2"></i>Lista de Empresas
        </h1>
        <a href="{{ route('empresas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Nova Empresa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Porte</th>
                            <th>Proprietário</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->name }}</td>
                                <td>{{ formatCnpj($empresa->cnpj) }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $empresa->size == 'small' ? 'info' : ($empresa->size == 'medium' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($empresa->size) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $empresa->user->id) }}" class="text-decoration-none">
                                        <i class="fas fa-user me-1"></i> {{ $empresa->user->name }}
                                    </a>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-info" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta empresa?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-building fa-2x mb-3 text-muted"></i>
                                    <p class="text-muted">Nenhuma empresa cadastrada</p>
                                    <a href="{{ route('empresas.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus me-1"></i> Criar Empresa
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }

        .bg-info {
            background-color: var(--success-color) !important;
        }

        .bg-warning {
            background-color: var(--warning-color) !important;
        }

        .bg-danger {
            background-color: var(--danger-color) !important;
        }

        a.text-decoration-none {
            transition: var(--transition);
            color: var(--text-dark);
        }

        a.text-decoration-none:hover {
            color: var(--primary-color);
        }

        @media (max-width: 992px) {
            table td:nth-child(3),
            table th:nth-child(3) {
                display: none;
            }
        }

        @media (max-width: 768px) {
            table td:nth-child(1),
            table th:nth-child(1) {
                display: none;
            }

            .d-flex {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
@endsection

@php
    function formatCnpj($cnpj) {
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj);
    }
@endphp