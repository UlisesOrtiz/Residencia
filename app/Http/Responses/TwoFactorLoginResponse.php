<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use App\Constants\Constants;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        if ($request->wantsJson()) {
            return response('', 204);
        }

        // switch ($role) {
        //     case Constants::ROLE['ADMINISTRADOR']:
        //         return redirect()->intended(config('fortify.home'));
        //     case Constants::ROLE['ESTUDIANTE']:
        //         return redirect()->intended('dashboard');
        //     default:
        //         return redirect('/');
        // }
    }
}
