<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{


    public function index()
    {
        $user = Auth::user();


        switch ($user->role_id) {
            case 1:
                $announces = Announce::where('user_id', $user->id)->get();
                return view('dashboard.societe', compact('announces'));

            case 2:
                $announces = Announce::all();
                return view('dashboard.client', compact('announces'));
            case 3:
                // $announces = Announce::all();
                return view('dashboard.admin');


            default:
                dd("error");
                break;
        }
    }

    public function create()
    {
        $tags = Tag::all();

        return view('announce.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:5|max:255',
            'nb_place' => 'required|numeric|min:1',
            'description' => 'required|string|min:5|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'tags' => 'required|array|min:1',
            // 'tags.*' => 'exists:tags,id',
        ]);

        $announce = Announce::create([
            'title' => $request->title,
            'content' => $request->content,
            'nb_place' => $request->nb_place,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'user_id' => Auth::id(),
        ]);


        if ($request->has('tags')) {
            $announce->tags()->attach($request->tags);
        }

        return redirect('/dashboard')->with('success', 'You have added a new announce');
    }



    public function destroy(Announce $announce)
    {

        $announce->delete();
        return redirect('/dashboard')->with('success', 'announce deleted');;
    }

    public function edit($id)
    {

        $announce = Announce::findOrFail($id);
        $tags = Tag::all();

        $selectedTags = $announce->tags->pluck('id')->toArray();
        return view('announce.edit', compact('announce', 'tags', 'selectedTags'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:5|max:255',
            'nb_place' => 'required|numeric|min:1',
            'description' => 'required|string|min:5|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'tags' => 'required|array|min:1',
        ]);

        $announce = Announce::findOrFail($id);
        $announce->title = $request->title;
        $announce->content = $request->content;
        $announce->nb_place = $request->nb_place;
        $announce->description = $request->description;
        $announce->date_debut = $request->date_debut;
        $announce->date_fin = $request->date_fin;
        $announce->heure_debut = $request->heure_debut;
        $announce->heure_fin = $request->heure_fin;

        $announce->save();

        $announce->tags()->sync($request->tags);


        return redirect('/dashboard')->with('success', 'announce updated');;
    }

    public function show($id)
    {
        $announce = Announce::findOrFail($id);

        return view('dashboard.show', compact('announce'));
    }


    public function stats()
    {

        $user = Auth::user();

        $announces = Announce::where('user_id', $user->id)->withCount('reservations')->get();
        return view('dashboard.stats', compact('announces'));
    }
}
