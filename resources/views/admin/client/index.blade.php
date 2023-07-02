@extends('admin.app')

@section('content')

 <!-- DataTales Example -->
 <div class="card shadow mb-4">

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card-header py-3">
        
        <h5 class="m-0 font-weight-bold text-primary">Lista de los Cliente   
            <a class="nav__links" data-toggle="modal" data-target="#registerModal">
              <button type="button" class="btn btn-success">Nuevo Cliente</button></a> 
            </a>
        </h5>     
    </div>
    
    <div class="card-body">
        <div class="col-xl-12">
            <form action="{{url('admin/client')}}" method="get">
                <div class="form-row">
                    <input type="text" class="form-control" name="texto" value="{{$texto}}">
                </div>
                <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>
        @if($users->count()>0)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)                
                    <tr>
                        <td>{{$user->ci}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
         
                            <form action="{{route('admin.client.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('admin.client.edit',$user->id)}}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>    
                                
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                             </form>
                          </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
            
        </div>
        @else
            <div class="card-body">
                <strong> No hay ningun registro</strong>
            </div>
        @endif
    </div>
</div>


<!--Esta parte es para que se cree un usuario con modal -->

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>

          <div class="modal-body">
              <form method="POST" action="/admin/client">
                  @csrf

                  <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                    <label for="apellido_p" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                    <div class="col-md-6">
                        <input id="apellido_p" type="" class="form-control" name="apellido_p" value="{{ old('apellido_p') }}" required autocomplete="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="apellido_m" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                    <div class="col-md-6">
                        <input id="apellido_m" type="" class="form-control" name="apellido_m" value="{{ old('apellido_m') }}" required autocomplete="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('Cedula Identidad') }}</label>

                    <div class="col-md-6">
                        <input id="ci" type="" class="form-control" name="ci" value="{{ old('ci') }}" required autocomplete="">
                    </div>
                </div>

                  <div class="row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control" name="password">
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">
                          {{ __('Register') }}
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection

