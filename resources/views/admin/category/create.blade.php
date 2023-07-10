@extends('dashboard.master')

@section('title', 'Categoria')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Categoria</li>
        </ol>
    </nav>
@endsection

@section('content')
    {{-- Respostas --}}
    @include('dashboard.partials.errors')

    <form id="form" method="post" action="{{ route('category.store') }}">

        {{-- Elementos Ocultos --}}
        @csrf

        {{-- Dados do Categoria--}}
        @include('admin.category.partials._category')

        {{-- Botão --}}
        <div class="row mt-3">
            <div class="col-md-12">
                <button class="ladda-button btn btn-success" dir="ltr" data-style="expand-left">
                    Cadastrar
                </button>
            </div>
        </div>
    </form>
@endsection

@section('footer-extras')
    <script src="{{ mix('js/category.js') }}"></script>
@endsection
