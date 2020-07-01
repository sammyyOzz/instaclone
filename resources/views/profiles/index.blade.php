@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fbni1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/101445820_587263755241837_6168186823604144619_n.jpg?_nc_ht=instagram.fbni1-1.fna.fbcdn.net&_nc_cat=1&_nc_ohc=oobRkFrp2fkAX9APPGX&oh=5642d43edcc753e14474ce17f305ba53&oe=5F189E7D" class ="rounded-circle w-100">
        </div>

        <div class="col-9">
            <div class="pt-5 d-flex justify-content-between  align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>88</strong> followers</div>
                <div class="pr-5"><strong>16</strong> following</div>
            </div>

            {{-- <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div> --}}

            <div class="pt-4 font-weight-bold">
                @if($user->profile)
                    {{ $user->profile->title }}
                @endif
            </div>
            <div>
                @if($user->profile)
                    {{ $user->profile->description }}
                @endif
            </div>
            <div>
                @if($user->profile)
                    {{ $user->profile->url }}
                @endif
            </div>
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




