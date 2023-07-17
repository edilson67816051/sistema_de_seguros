<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
   
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));

        $users = DB::table('users')

            ->where('usuario', '=', 1)
            ->where('estado', '=', 1)
            ->where(function ($query) use ($texto) {
                $query->where('name', 'LIKE', '%' . $texto . '%')
                    ->orWhere('email', 'LIKE', '%' . $texto . '%')
                    ->orWhere('ci', 'LIKE', '%' . $texto . '%');
            })
            ->orderBy('id','asc')
            ->paginate(3);

            $user = Auth::user();
            $user->logs()->create([
                'action' => 'Lista de los usuarios',
                'ip_address' => $request->ip(),
            ]);

        return view('admin.users.index',['users'=>$users,'texto'=>$texto]);
    }

   
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        try {
            // Tu código para insertar el nuevo registro en la base de datos
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->apellido_p = request('apellido_p');
            $user->apellido_m = request('apellido_m');
            $user->ci = request('ci');

            $user->password = bcrypt(request('password'));
            $user->usuario = 1;
            $user->estado = 1;
            $user->save();

            $user = Auth::user();

            $user->logs()->create([
                'action' => 'Creo un nuevo usuario',
                'ip_address' => $request->ip(),
            ]);

            return redirect('/admin/users')->with('success', 'El usuario se ha registrado correctamente.');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'El correo electrónico ya existe.');
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request,User $user)
    {      

        $user->roles()->sync($request->roles);    

        return redirect()->route('admin.users.edit',$user)->with('info','Se asigno los roles Correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $user= User::find($id);
        $user->estado=0;
        $user->update();
        return redirect('admin/users');
    }

    public function actualizar_password(Request $request)
    {
     
        $password_a = request('password_a');
        $password_n = request('password_n');   
        $password_f=request('password_confirmation');
        
        dd(Hash::check('12345678','12345678'));
        
        if ($password_a == $password_ac){
            $user = User::findOrFail(Auth::user()->id);
                $user->password =bcrypt($password_n) ;        
                $user->save();
        }else
            return view('admin.users.index');
    }
    
}
