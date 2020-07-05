<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; //the image class

class ProfilesController extends Controller
{
    public function list()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('profiles.list', compact('users'));
    }

	//user was fetched manually, it can be done better with route model binding
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;


    	//both lines for passing the user to the view
    	//$user = User::findOrFail($user);

        return view('profiles.index', compact('user', 'follows'));
    }

    //the '\App\' below can be ommitted since we are importing the user class above with the use statement
    public function edit(\App\User $user)
    {
    	$this->authorize('update', $user->profile); //this line was brought in after adding the profile policy to add protection to who can update a profile

    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
		$this->authorize('update', $user->profile); //this line was brought in after adding the profile policy to add protection to who can update a profile

    	$data = request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'url' => 'url',
    		'image' => '',
    	]); 

    	if(request('image'))
    	{	
    		//the profile image is stored in the profile folder located in public
    		$imagePath = request('image')->store('profile', 'public');
			$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
			$image->save();

			$imageArray = ['image' => $imagePath];  //fix for "undefined variable: imagePath" error  (3 hours 17 mins in the video)
    	}

    	//array_merge appends multiple arrays together... placing the image array second as shown below replaces its value in
    	//$data which is the first array 
    	auth()->user()->profile->update(array_merge(
    		$data,
    		$imageArray ?? []  //fix for "undefined variable: imagePath" error  (3 hours 17 mins in the video)
    	));


    	return redirect("/profile/{$user->id}");
    }
}
