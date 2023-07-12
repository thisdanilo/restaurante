@extends('dashboard.master')

@section('title', 'Restaurantes')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Restaurantes</li>

            @can('tenant_create')
                <a href="{{ route('tenant.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
    <input type="hidden" id="datatable-route" value="{{ route('tenant.datatable') }}">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Razão Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>Telefone</th>
                            <th style="width: 5%;">Ativo</th>
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
    <script src="{{ mix('js/tenant.js') }}"></script>
@endsection
