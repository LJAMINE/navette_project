<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{



    public function store()
    {
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attribute)) {
            throw ValidationException::withMessages([
                'email' => 'sorry wrong email or password'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/dashboard')->with('success', 'You have been logged in.');;
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
