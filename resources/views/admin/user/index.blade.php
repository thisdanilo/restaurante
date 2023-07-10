@extends('dashboard.master')

@section('title', 'Usuários')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Usuários</li>

            @can('user_create')
                <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    Cadastro
                </a>
            @endcan
        </ol>
    </nav>
@endsection

@section('content')
    @include('notify::components.notify')

    {{-- Elementos Ocultos --}}
    @csrf
    <input type="hidden" id="datatable-route" value="{{ route('user.datatable') }}">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Restaurante</th>
                            <th>Função</th>
                            <th>Ativo</th>
                            <th style="width: 5%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer-extras')
    <script src="{{ mix('js/user.js') }}"></script>
@endsection
