@extends('layouts.app')

@section('content')
<div class="container">
	<div class="pb-2"><h2>Other InstaClone Users:</h2></div>
	<hr class="pb-4" style="height: 12px;">

    @foreach($users as $user)
    		<div class="row align-items-center offset-2 pb-4">
	    		<div class="col-4">
	    			<a href="/profile/{{ $user->id }}">
	    				<img src="{{ $user->profile->profileImage() }}" class ="rounded-circle w-100" style="max-width: 100px;">
	    			</a>
	    		</div>

	    		<div class="col-4 ">
	    			<h3><a  class="font-weight-bold text-dark" href="/profile/{{ $user->id }}">{{ $user->username }}</a></h3>
	    		</div>
    		</div>
    		<div class="row offset-2">
    			<div class="col-8 pb-4"><hr></div>
    		</div>
    @endforeach
</div>
@endsection




