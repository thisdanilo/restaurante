@extends('dashboard.master')

@section('title', 'Função')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Função</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{-- Dados da Função---}}
    @include('admin.role.partials._role', ['show' => true])


    {{-- Botão --}}
    @can('role_edit')
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    @endcan

@endsection