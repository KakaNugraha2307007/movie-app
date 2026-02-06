<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;

        try {
            if ($query) {
                $response = Http::get(
                    'https://api.tvmaze.com/search/shows?q=' . $query
                );

                $movies = collect($response->json())
                    ->pluck('show')
                    ->shuffle();
            } else {
                $response = Http::get('https://api.tvmaze.com/shows');

                $movies = collect($response->json())
                    ->shuffle()
                    ->take(30);
            }
        } catch (\Exception $e) {
            $movies = collect([]);
        }

        return view('movies.index', compact('movies', 'query'));
    }
}
