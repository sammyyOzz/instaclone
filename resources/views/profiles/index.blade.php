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
                <div class="pr-5"><strong>1</strong> posts</div>
                <div class="pr-5"><strong>88</strong> followers</div>
                <div class="pr-5"><strong>16</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="https://instagram.fbni1-1.fna.fbcdn.net/v/t51.2885-15/e35/p1080x1080/104203356_822619448271538_2230793226924528710_n.jpg?_nc_ht=instagram.fbni1-1.fna.fbcdn.net&_nc_cat=1&_nc_ohc=Nr1kWYbwtm0AX8u3C2K&oh=22424437107cfca3af74e4797c273907&oe=5F198FC7" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fbni1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.180.1440.1440a/s640x640/94893589_921725051629366_8110452400042020182_n.jpg?_nc_ht=instagram.fbni1-1.fna.fbcdn.net&_nc_cat=110&_nc_ohc=XbKomAycnmMAX8QA8zj&oh=37a1d0fee2d78f68ed97e198c8a59845&oe=5F189AD5" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fbni1-2.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/89951561_2418726955100693_3545373609463000962_n.jpg?_nc_ht=instagram.fbni1-2.fna.fbcdn.net&_nc_cat=105&_nc_ohc=fTJLQo4eBDkAX8wxvSF&oh=88f09975548fed777a8e10a1924f431a&oe=5F179B34" class="w-100">
        </div>
    </div>

    
</div>
@endsection




