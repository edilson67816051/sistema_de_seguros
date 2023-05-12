@extends('admin.home')
@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualiza los datos</h1>
                            </div>
                            <form class="user" action="{{route('admin.users.update',$user->id)}}">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" value="{{$user->name}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" value="{{$user->email}}">
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block"> Guardar Cambio</button>
                                
                               
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                  Cancelar
                                </a>
                            </form>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection   