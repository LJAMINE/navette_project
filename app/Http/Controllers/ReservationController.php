<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([

            'announce_id' => 'required|exists:announces,id',
            'nb_places' => 'required|integer|min:1',

        ]);

        $announce = Announce::findOrFail($request->announce_id);

        if ($request->nb_places > $announce->nb_place) {

            return back()->with('error', 'Not enough seats available.');
        }

        Reservation::create([
            'user_id' => Auth::id(),
            'announce_id' => $request->announce_id,
            'nb_places' => $request->nb_places,
        ]);

        $announce->decrement('nb_place', $request->nb_places);
        return redirect('/dashboard')->with('success', 'You successefully reserved .');
    }

    public function panier()
    {


        $reservations = Reservation::where('user_id', Auth::id())
            ->with('announce')
            ->get();


        return view('dashboard.panier',compact('reservations'));
    }
}
