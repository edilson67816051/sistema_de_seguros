<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poliza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{   
    public function index()
    {
        
        if (Auth::user()->cliente == 1){
            return view('cliente.home');
        }else{
            return view('admin.dashboard');
        }
       // 

        
           
    }
}
