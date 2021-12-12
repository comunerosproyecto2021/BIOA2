@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-left">
        <h2 class="text-center">Inicio de sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Correo</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="empresa" class="col-md-4 col-form-label text-md-right">Empresa</label>
                    <select  id="empresa" class="form-control">
                        <option selected value="">Seleccione...</option>
                        <option value="1">Empresa 1</option>
                        <option value="2">Empresa 2</option>
                    </select>
                    @error('empresa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Recordar contraseña
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Iniciar sesión
                    </button>
                </div>
            </div>
        </form>       
    </div>
    <div class="container-right">
        <img width="100%" height="400rem"src="{{ asset('images/login.svg') }}" alt="">
    </div>
</div>
@endsection
