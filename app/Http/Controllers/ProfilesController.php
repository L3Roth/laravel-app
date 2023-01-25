<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        //$user = User::findOrFail($user); no longer needed bc route model binding
        return view('profiles.index', compact('user'));
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile); //authorized what is demanded in policy

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        )); //auth() gives extra protection so only the user can update its profile

        return redirect("/profile/{$user->id}");
    }
}
