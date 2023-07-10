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

    {{-- Dados do Categoria --}}
    @include('admin.category.partials._category', ['show' => true])


    {{-- Botão --}}
    @can('category_edit')
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    @endcan

@endsection

@section('footer-extras')
    <script src="{{ mix('js/category.js') }}"></script>
@endsection
