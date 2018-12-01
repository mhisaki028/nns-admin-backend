<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
   

    	if(Auth::attempt([
    		'email' => $request->email,
    		'password' => $request->password
    	]))
    	{
    		$user = User::where('email', $request->email)->first();
            

    		if($user->is_admin())
    		{
    			return redirect()->route('home');
    		}
            else if($user->email=== 'lc@md.dev'){

    			return redirect()->route('lclabhome');
            }

            else if($user->email=== 'mmgplaza@md.dev'){

                return redirect()->route('mmglabhome');
            }
            else if($user->email=== 'ludacs@md.dev'){

                return redirect()->route('ludacslabhome');
            }
    	}
    	return redirect()->back();
	}
}
