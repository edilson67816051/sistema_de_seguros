@extends('auth.app')
@section('content')
        <form class="formulario" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="texto-formulario">
                <h2>Bienvenido de nuevo</h2>
                <p>Ingresa tu Correo para realizar el cambio</p>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
        @endif  
            </div>
            <div class="input">
                
                <label for="email">Email</label>
                <input id="email" placeholder="Ingresa tu correo" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          
            </div>
            <div class="input">                            
                    <input type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>               
            </div>
        </form>
@endsection