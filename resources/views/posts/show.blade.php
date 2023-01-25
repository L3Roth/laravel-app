@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div style="padding-right: 1em">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100"
                                 style="max-width: 40px">
                        </div>
                        <div>
                            <div style="font-weight: bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                <a style="padding-left: 1em" href="#">Follow</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <span style="font-weight: bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span> {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
