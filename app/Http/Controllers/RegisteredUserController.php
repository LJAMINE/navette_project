<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $requestvalid = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'address' => ['required'],
            'role_id' => ['required', 'exists:roles,id'],

        ]);

        // $requestvalid['status'] = 'inactive';

        $user = User::create($requestvalid);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'You have been registered.');
    }
}
