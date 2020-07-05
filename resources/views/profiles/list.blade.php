@extends('layouts.app')

@section('content')
<div class="container">
	<div class="pb-4"><h2>Other InstaClone Users:</h2></div>

    @foreach($users as $user)
    		<div class="row align-items-center offset-2 pb-4">
	    		<div class="col-4">
	    			<a href="/profile/{{ $user->id }}">
	    				<img src="{{ $user->profile->profileImage() }}" class ="rounded-circle w-100" style="max-width: 100px;">
	    			</a>
	    		</div>

	    		<div class="col-4 ">
	    			<a href="/profile/{{ $user->id }}"><h3 class="font-weight-bold text-dark">{{ $user->username }}</h3></a>
	    		</div>
    		</div>
    @endforeach
</div>
@endsection




