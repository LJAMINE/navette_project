<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{


    public function index()
    {
        $user = Auth::user(); 
        if ($user->role === 'client') {
            return view('dashboard.client');
        }

        $announces = Announce::where('user_id', $user->id) 
        ->orderBy('created_at', 'asc')
        ->paginate(3);
        
        return view('dashboard.societe', compact('announces'));
    }
}
