<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getAdminAuth()
    {
        return view('login');
    }

    public function postAdminAuth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30'
        ], [
            'email.exists' => 'Cet email n\'existe pas'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('getDashboard'));
        }

        // Authentification échouée, rediriger avec un message d'erreur
        return redirect()->route('getAdminAuth')->with('error', 'Identifiants invalides.');
    }

    public function getAdminLogout()
    {
        Auth::logout();

        return redirect()->route('getAdminAuth');
    }
}
