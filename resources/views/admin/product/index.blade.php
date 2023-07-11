@extends('dashboard.master')

@section('title', 'Produtos')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Produtos</li>

            @can('product_create')
                <a href="{{ route('product.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
    <input type="hidden" id="datatable-route" value="{{ route('product.datatable') }}">

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Preço</th>
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
    <script src="{{ mix('js/product.js') }}"></script>
@endsection
