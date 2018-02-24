<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;


class member extends Controller
{
    public function login_form(){
        return view('login');
    }

    public function login(Request $request){
        
        $credentials = [
            'email'    => $request->email,
            'password' => $request->psw,
        ];

        
       
        if ($auth = Sentinel::authenticate($credentials))
        {
            return redirect('blogs/list');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors('Invalid login or password.');
    
    }

    

    

    public function postRegister(Request $request){
        $credentials = [
            'email'    => $request->email,
            'password' => $request->psw,
        ];
        $user = Sentinel::register($credentials,true);
    }
}
