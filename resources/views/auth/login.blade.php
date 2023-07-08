@extends('auth.layouts.master')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-lg-6 text-center offset-3">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                </div>

                @if ($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger" role="alert">

                        {{ $errors->has('email') ? $errors->first('email') : '' }} <br>

                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                @endif

                <form class="user" method="POST" action="{{ url('/login') }}">

                    {{-- Elementos Ocultos --}}
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('password.request') }}">Esqueceu a senha?</a>

                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
