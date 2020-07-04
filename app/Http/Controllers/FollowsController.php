<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function store(User $user)  //store verb was chosen because we are basically storing a following
    {
    	return auth()->user()->following()->toggle($user->profile);
    }
}
