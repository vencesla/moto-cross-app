<?php

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        // Personnalisez votre logique de redirection ici
        if ($request->user()->hasRole('admin')) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/trainings');
        }
    }
}