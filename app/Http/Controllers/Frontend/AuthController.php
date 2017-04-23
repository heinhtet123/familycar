<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class AuthController extends Controller
{
    function login()
    {
    	if(!Auth::check()):
    		return view("frontend.login");
    	else:
    		return \Redirect::intended($this->redirectPath());
    	endif;
    }

    function logout()
    {
    	\Session::flush();
         Auth::logout();
        return \Redirect::back ();
    }

    function login_process(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$email=$request->input("email");
    		$password=$request->input("password");
            // guard before attempt
    		if (Auth::attempt(['email' => $email, 'password' => $password])) 
    		{
	    		$user=User::where("email",$email)->first();
	    		session(['id' => $user->id,'email'=>$user->email]);
            	// Authentication passed...
    		
    			return redirect()->intended($this->redirectPath());	
    		
            
        	}



    	}

    	
    }

    private function redirectPath()
    {
    	if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/frontend';

    }
}
