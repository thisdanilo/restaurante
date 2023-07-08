@extends('auth.layouts.master')

@section('title', 'Redefinir Senha')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-center offset-3">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Atualize sua senha!</h1>
                </div>

                @if ($errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))
                    <div class="alert alert-danger" role="alert">

                        {{ $errors->has('email') ? $errors->first('email') : '' }} <br>

                        {{ $errors->has('password') ? $errors->first('password') : '' }} <br>

                        {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                    </div>
                @endif

                <form class="user" method="POST" action="{{ route('password.store') }}">

                    {{-- Elementos Ocultos --}}
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Confirme sua senha" required>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('login') }}">Retornar ao login</a>

                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Resetar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
