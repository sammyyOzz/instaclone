<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$users = auth()->user()->following()->pluck('profiles.user_id'); //remember the user is following profiles and not users so the user_id of the profiles have to be plucked to get the auth user's followers

		$posts = Post::whereIn('user_id', $users)->latest()->get();

		return view('home', compact('posts'));
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store()
	{
		$data = request()->validate([
			'caption' => 'required',
			'upload_file' => ['required', 'file' => 'mimes:jpeg,bmp,png,avi,mpeg,quicktime,mp4'],
		]);

		//I believe the store and create functions below ship with laravel,
		//store is responsible for moving the file to the uploads folder which is located in public,

		$uploadPath = request('upload_file')->store('uploads', 'public');

		//I think this should be modified to integrate videos as well
		$upload = Image::make(public_path("storage/{$uploadPath}"))->fit(1200, 1200);

		$upload->save();

		auth()->user()->posts()->create([

			'caption' => $data['caption'],
			'upload_file' => $uploadPath,
		]);

		return redirect('/profile/' . auth()->user()->id);
	}

	//Route model binding was done here
	public function show(\App\Post $post)
	{
		return view('posts.show', compact('post'));
	}
}
