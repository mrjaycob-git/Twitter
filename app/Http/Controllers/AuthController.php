<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        Log::info("Prichádzajúce údaje:", request()->all());

        try {
            $validated = request()->validate(
                [
                    'name' => 'required|min:3|max:40',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|confirmed',
                ]
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Chyby validácie:", $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }

        Log::info("Validácia prebehla úspešne");

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Account created Successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}

