@extends('dashboard.master')

@section('title', 'Lanchonetes')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Restaurantes</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{-- Dados do Restaurante--}}
    @include('admin.tenant.partials._tenant', ['show' => true])

    {{-- Botão --}}
    <div class="row mt-3">
        <div class="col-md-12">
            <a href="{{ route('tenant.edit', $tenant->id) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
    </div>

@endsection

@section('footer-extras')
    <script src="{{ mix('js/tenant.js') }}"></script>
@endsection
