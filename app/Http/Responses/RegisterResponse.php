<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // set to index
        $to = '/register/success';

        $request->session()->flash('success_register', 'Success Register');

        // return redirect from variable $to
        return redirect()->intended($to);
    }
}