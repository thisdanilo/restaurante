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
    {{-- Respostas --}}
    @include('dashboard.partials.errors')
    @include('notify::components.notify')

    <form id="form" method="post" action="{{ route('user.update', $user->id) }}">

        {{-- Elementos Ocultos --}}
        @csrf
        @method('PUT')

        {{-- Dados da Usuário- --}}
        @include('admin.user.partials._user')

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
