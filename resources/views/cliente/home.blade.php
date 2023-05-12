@extends('cliente.app')
@section('content')

<div class="container"> 

<form class="row" action="" method="post">
    <ul>
     <li>
       <label class="form-label" for="name">Nombre: {{ Auth::user()->name}}</label>
     </li>
     <li>
      <label for="name">Apellido Paterno: {{ Auth::user()->apellido_p}}</label>
    </li>
    <li>
      <label for="name">Apellido Materno: {{ Auth::user()->apellido_m}}</label>
    </li>
     <li>
        <label for="msg">Cedula identidad: {{ Auth::user()->ci}}</label>
      </li>
     <li>
       <label for="mail">Correo electrónico: {{ Auth::user()->email}}</label>
     </li>
     <li>
       <label for="msg">Celular: {{ Auth::user()->celular}}</label>
     </li>
     <li class="nav__items">
      <a class="nav__links" data-toggle="modal" data-target="#registerModal">Actualiza tus datos</a>
    </li>
    <li class="nav__items">
      <a class="nav__links" data-toggle="modal" data-target="#contracenaModal">Cambia tu contraceña</a>
    </li>
    </ul>
   
   </form>
</div>

   <!-- Modal  modifica tus datos  -->

   <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualiza tus datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido P') }}</label>
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Apellido M') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cedula identidad') }}</label>
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
              </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      </div>
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal  modifica tus datos  -->

<div class="modal fade" id="contracenaModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambia Contracena</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraceña anterior') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nueva contraceña') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirma contraceña') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">
                          {{ __('Cambiar') }}
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection