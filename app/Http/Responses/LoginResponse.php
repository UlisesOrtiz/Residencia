<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Constants\Constants;

class LoginResponse implements LoginResponseContract
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
            return response()->json(['two_factor' => false]);
        }

        switch ($role) {
            case Constants::ROLE['ADMINISTRADOR']:
                return redirect()->route('admin.dashboard');
            case Constants::ROLE['ESTUDIANTE']:
                return redirect()->route('student.dashboard');
            case Constants::ROLE['DOCENTE']:
                return redirect()->route('teacher.dashboard');
            case Constants::ROLE['FINANCIERO']:
                return redirect()->route('financial.dashboard');
            case Constants::ROLE['ORIENTACION']:
                return redirect()->route('orientation.dashboard');
            default:
                return redirect('/');
        }
    }
}
