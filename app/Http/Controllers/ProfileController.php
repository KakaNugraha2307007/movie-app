<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(), // ⭐ FIX
        ]);
    }

    public function update(Request $request)
    {
        $request->user()->update(
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ])
        );

        return back()->with('success', 'Profile berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        $request->user()->delete();
        return redirect('/');
    }
}
