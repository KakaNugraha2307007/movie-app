<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->latest()->get();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        Favorite::firstOrCreate(
            [
                'user_id'  => Auth::id(),
                'movie_id' => $request->movie_id,
            ],
            [
                'title'  => $request->title,
                'image'  => $request->image,
                'rating' => $request->rating,
            ]
        );

        return back()->with('success', 'Ditambahkan ke favorit');
    }

    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id === Auth::id()) {
            $favorite->delete();
        }

        return back();
    }
}
