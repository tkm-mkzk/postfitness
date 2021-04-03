<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function show($id)
    {
        $user = User::find($id);

        $blogs = $user->blogs->sortByDesc('created_at');

        return view('user.show', [
            'user' => $user,
            'blogs' => $blogs,
        ]);
    }

    public function likes($id)
    {
        $user = User::where('id', $id)->first();

        $blogs = $user->likes->sortByDesc('created_at');

        return view('user.likes', [
            'user' => $user,
            'blogs' => $blogs,
        ]);
    }

    public function followings($id)
    {
        $user = User::where('id', $id)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('user.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers($id)
    {
        $user = User::where('id', $id)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('user.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['id' => $id];
    }

    public function unfollow(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['id' => $id];
    }
}
