<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.post.' . $user->id,
            now()->addSecond(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );
        $followerCount = Cache::remember(
            'count.follower.' . $user->id,
            now()->addSecond(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSecond(30),
            function () use ($user) {
                return $user->following->count();
            }
        );
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
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
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $imageArray = ['image' => $imagePath];
        }
        Auth::user()->profile->update(array_merge($data, $imageArray ?? []));




        return redirect('/profile/' . $user->id);
    }
}
