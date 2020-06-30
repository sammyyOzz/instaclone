<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	//user was fetched manually, it can be done better with route model binding
    public function index($user)
    {
    	$user = User::findOrFail($user);

        return view('profiles.index', compact('user'));
    }
}
