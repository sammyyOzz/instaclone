<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	//user was fetched manually, it can be done better with route model binding
    public function index($user)
    {
    	//both lines for passing the user to the view
    	$user = User::findOrFail($user);

        return view('profiles.index', compact('user'));
    }

    //the '\App\' below can be ommitted since we are importing the user class above with the use statement
    public function edit(\App\User $user)
    {
    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
    	$data = request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'url' => 'url',
    		'image' => '',
    	]); 

    	auth()->user()->profile->update($data);

    	return redirect("/profile/{$user->id}");
    }
}
