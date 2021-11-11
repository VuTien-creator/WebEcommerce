<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        // below is the existing response
        // replace this with your own code
        if($request->wantsJson()){
            return new JsonResponse('',201);
        }else{
            $role = Auth::user()->role->role;
            if($role ==='customer'){
                return redirect()->route('customer.index');
            }elseif($role ==='admin'){
                return redirect()->route('admin.index');
                // return redirect()->intended(config('fortify.home'));
            }else{
                return redirect()->to('/404');
            }
        }
    }
}
