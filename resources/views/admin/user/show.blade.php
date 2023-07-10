@extends('dashboard.master')

@section('title', 'Usuário')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Usuário</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{-- Dados da Usuário---}}
    @include('admin.user.partials._user', ['show' => true])


    {{-- Botão --}}
    @can('user_edit')
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        </div>
    @endcan

@endsection
