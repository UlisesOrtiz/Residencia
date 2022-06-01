<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VerifiedUserRoute extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function verfied()
    {
        $routes = [
            Constants::ROLE['ADMINISTRADOR'] => 'admin.dashboard',
            Constants::ROLE['ESTUDIANTE'] => 'student.dashboard',
            Constants::ROLE['DOCENTE'] => 'teacher.dashboard',
            Constants::ROLE['FINANCIERO'] => 'financial.dashboard',
            Constants::ROLE['ORIENTACION'] => 'orientation.dashboard',
        ];
        
        $userRole = Auth::user()->role;
        $route =  $routes[$userRole];
        return redirect()->route($route);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect()->route('login');
    }
}
