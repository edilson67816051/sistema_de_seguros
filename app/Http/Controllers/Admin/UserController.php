<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name =request('name');
        $user->email = request('email');
        $user->password =bcrypt(request('password')) ;
        $user->save();
        return redirect('/admin/users');
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
            $user = User::findOrFail($id);
        return view('admin.users.edit',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name =request('name');
        $user->email = request('email');
        if (request('password')){
            $user->password =bcrypt(request('password')) ;
        }
        
        $user->save();
        return redirect('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
