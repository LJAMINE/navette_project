<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('dashboard.tags.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|string|min:5|max:244',
            'description' => 'required|string|min:5|max:244',

        ]);

        Tag::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        // dd("good");
        return redirect()->route('dashboard.tags.index')->with('success', 'You have added a tag');
    }

    public function destroy(Tag $tag)
    {

        $tag->delete();
        return redirect()->route('dashboard.tags.index')->with('success', 'You have deleted a tag');
    }

    public function edit($id)
    {

        $tag = Tag::findOrFail($id);
        return view("dashboard.tags.edit", compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|min:5|max:244',
            'description' => 'required|string|min:5|max:244',

        ]);

        $tag = Tag::findOrFail($id);
        $tag->title = $request->title;
        $tag->description = $request->description;

        $tag->save();
        return redirect()->route('dashboard.tags.index')->with('success', 'You have updated a tag');
    }
}
