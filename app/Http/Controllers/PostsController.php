<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
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

		dd(request()->all());
	}
}
