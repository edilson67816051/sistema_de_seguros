<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));

        $client = DB::table('users')

            ->where('cliente', '=', 1)
            ->where('estado', '=', 1)
            ->where(function ($query) use ($texto) {
                $query->where('name', 'LIKE', '%' . $texto . '%')
                    ->orWhere('email', 'LIKE', '%' . $texto . '%')
                    ->orWhere('ci', 'LIKE', '%' . $texto . '%');
            })
            ->orderBy('id','asc')
            ->paginate(3);

        return view('admin.client.index',['users'=>$client,'texto'=>$texto]);
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
            $user->usuario = 0;
            $user->cliente =1;
            $user->estado = 1;
            $user->save();

            return redirect('/admin/client')->with('success', 'El Cliente se a registrado correctamente.');
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
        return redirect('admin/client');
    }
}
