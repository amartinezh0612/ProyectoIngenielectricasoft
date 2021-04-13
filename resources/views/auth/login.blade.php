<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../resources/views/auth/style-login.css">
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.app')
@section('content')
<form class="needs-validation" method="POST" action="{{ route('login') }}">
 @csrf
 <br>
 <br>
 <br>
 <div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in card-header" checked><label for="tab-1" class="tab">{{ __('Iniciar Sesión') }}</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="email" class="label">{{ __('Correo Electrónico') }}</label>
                    <div>
                       <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror"  placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-white">{{ $message }}</strong>
                                    </span>
                                @enderror
                     </div>
                </div>
                <div class="group">
                    <label for="password" class="label">{{ __('Contraseña') }}</label>
                    <div>
                         <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" placeholder="Contraseña"  name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-white">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="group">
                    <input type="submit" class="button" value=" {{ __('Iniciar Sesión') }}">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                             {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    <div class="label text-center">
					    No tienes una cuenta? <a href="{{ route('register') }}">Registrate</a>
				    </div>
                </div>                
                <div class="hr"></div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection