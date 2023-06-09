@extends('auth.app')
@section('content')
        <form class="formulario" method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="texto-formulario">
                <h2>Bienvenido de nuevo</h2>
                <p>Ingresa tu nueva contraceña</p>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                 @endif  
            </div>
            <div class="input">
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                            
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
            </div>
            <div class="input">                            
                    <input type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                    </button>               
            </div>
        </form>
@endsection