@extends('auth.layouts.master')

@section('title', 'Redefinir Senha')

@section('content')

    <div class="row">
        <div class="col-lg-6 text-center offset-3">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Redefinir senha!</h1>
                </div>

                @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">

                        {{ $errors->has('email') ? $errors->first('email') : '' }} <br>
                    </div>
                @endif

                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">

                        {!! session('status') !!}

                    </div>
                @endif

                <form class="user" method="POST" action="{{ route('password.email') }}">

                    {{-- Elementos Ocultos --}}
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Digite seu email" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Resetar Senha
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
