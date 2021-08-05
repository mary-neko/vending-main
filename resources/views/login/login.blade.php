@extends('login.layout')
@section('content')
<!-- ↓↓認証↓↓ -->
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('list') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<!-- ↑↑認証↑↑ -->
@endsection