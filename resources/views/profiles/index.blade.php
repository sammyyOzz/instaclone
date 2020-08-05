@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            {{-- <img src="/storage/{{ $user->profile->image }}" class ="rounded-circle w-100"> former line --}}
            <img src="{{ $user->profile->profileImage() }}" class ="rounded-circle w-100">
        </div>

        <div class="col-9">

            <div class="d-flex pt-5 justify-content-between  align-items-baseline">
                <div class = "d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    
                    {{-- @if(auth()->user()->id !== $user->id) --}}
                        <follow-button user-id = "{{ $user->id }}" follows="{{ $follows }}"></follow-button>  {{-- this links to the FollowButton.vue file, the 'follow-button' name is in the app.js file --}}
                    {{-- the user-id property is being passed to the follow button through here --}}
                    {{-- @endif --}}
                    
                </div>
    
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>

                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
           
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">                   
                    <img src ="/storage/{{ $post->upload_file }}" class="w-100">  
                </a>
            </div>
        @endforeach
    </div>

    
</div>
@endsection




