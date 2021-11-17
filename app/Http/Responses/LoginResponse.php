<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        

        $role = Auth::user()->is_admin; 
      
       
        if ($role == 1) { 
            
           return redirect('/admin');
        } else if ($role == 0) {
            return redirect('/home');
        }
        
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));
    }

}