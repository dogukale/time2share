@extends('default')

@section('title')
    Alle gebruikers
@endsection

@section('content')
@include('search')
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($user as $user)
        @include('user.components.userCard--index')
    @endforeach
</ul>
@endsection