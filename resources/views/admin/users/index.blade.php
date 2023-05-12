@extends('admin.home')

@section('content')

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Lista de los Usuarios   
            <a class="nav__links" data-toggle="modal" data-target="#registerModal">
              <button type="button" class="btn btn-success">Nuevo Usuario</button></a> 
            </a>
        </h5>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)                
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
         
                            <form action="" method="POST">
                                <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>    
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                             </form>
                          </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


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
              <form method="POST" action="/admin/users">
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

