@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://assets.bigcartel.com/theme_images/54651347/laravel-logo.png?auto=format&fit=max&h=200&w=1068"
                 class="rounded-circle" alt="laravel logo">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add new post</a>
            </div>
            <div class="d-flex">
                <div style="padding-right: 8px"><strong>{{$user->posts->count()}}</strong> posts </div>
                <div style="padding-right: 8px"><strong>23K</strong> followers</div>
                <div style="padding-right: 8px"><strong>212</strong> following</div>
            </div>
            <div class="pt-4" style="font-weight: bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="https://laravel.com/">{{$user->profile->url}}</a></div>

        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{$post->image}}" class="w-100" alt="dummy content image">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
