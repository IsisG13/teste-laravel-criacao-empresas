@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="fas fa-users me-2"></i>Lista de Usuários
        </h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Novo Usuário
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
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Empresas</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $user->number_empresas }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="fas fa-user-slash fa-2x mb-3 text-muted"></i>
                                    <p class="text-muted">Nenhum usuário cadastrado</p>
                                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus me-1"></i> Criar Usuário
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
        .page-title {
            color: var(--secondary-color);
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }

        .card {
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            padding: 1rem;
        }

        .table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }

        .btn {
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: var(--transition);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.5rem;
            }

            .d-flex {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }

            .table-responsive {
                border: 1px solid #dee2e6;
                border-radius: var(--border-radius);
            }
        }
    </style>
@endsection