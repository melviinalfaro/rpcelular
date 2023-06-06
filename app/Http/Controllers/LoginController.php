<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function handle($request, $next)
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }

        return $next($request);
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('inicio');
        } else {
            if (!User::where('email', $email)->exists()) {
                $errors['email'] = 'El correo es incorrecto';
            } elseif (!Auth::attempt(['password' => $password])) {
                $errors['password'] = 'La contraseña es incorrecta';
            }

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('cuenta'));
    }
}
