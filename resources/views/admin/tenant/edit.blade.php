@extends('dashboard.master')

@section('title', 'Restaurante')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Restaurante</li>
        </ol>
    </nav>
@endsection

@section('content')
    {{-- Respostas --}}
    @include('dashboard.partials.errors')
    @include('notify::components.notify')

    <form id="form" method="post" action="{{ route('tenant.update', $tenant->id) }}">

        {{-- Elementos Ocultos --}}
        @csrf
        @method('PUT')

        {{-- Dados do Restaurante --}}
        @include('admin.tenant.partials._tenant')

        {{-- Botão --}}
        <div class="row mt-3">
            <div class="col-md-12">
                <button class="ladda-button btn btn-success" dir="ltr" data-style="expand-left">
                    Editar
                </button>
            </div>
        </div>
    </form>
@endsection

@section('footer-extras')
    <script src="{{ mix('js/tenant.js') }}"></script>
@endsection
