<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {

        // return $request->wantsJson()? redirect
        if($request->wantsJson()){
            return    response()->json(['two_factor' =>  false]);
        }else{
            $role = Auth::user()->role->role ; //check admin or cutomer or something ...
            if($role ==='customer'){
                return redirect()->route('customer.index');
            }elseif($role ==='admin'){
                return redirect()->intended(config('fortify.home'));
            }else{
                return redirect()->back();
            }
        }

    }
}
