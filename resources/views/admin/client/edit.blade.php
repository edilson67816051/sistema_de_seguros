@extends('admin.app')

@section('title','Seguradora Fortaleza')


@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
            
        @endif
    
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>
    
            <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
                @csrf
                @method('PUT')
    
                @foreach ($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]"
                               value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $role->name }}</label>
                    </div>
                @endforeach
    
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
    
  
    </div>
   

@endsection   