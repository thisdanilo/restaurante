@extends('dashboard.master')

@section('title', 'Produto')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Produto</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{-- Dados do Produto --}}
    @include('admin.product.partials._product', ['show' => true])


    {{-- Botão --}}
    @can('product_edit')
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    @endcan

@endsection

@section('footer-extras')
    <script src="{{ mix('js/product.js') }}"></script>
@endsection
