<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../../resources/views/auth/style-resetpass.css">
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.app')
@section('content')
<div class="card-body">
<form method="POST" action="{{ route('password.email') }}">
 @csrf
 <br>
 <br>
 <br>
 <div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in card-header" checked><label for="tab-1" class="tab">{{ __('Restablecer Contraseña') }}</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="email" class="label">{{ __('Correo Electrónico') }}</label>
                    <div>
                       <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror"  placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                     </div>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="{{ __('Restablecer Contraseña') }}">
                </div>                
                <div class="hr"></div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection