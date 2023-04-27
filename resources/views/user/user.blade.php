@extends('default')

@section('title')
    Gebruiker {{$user->name}}
@endsection

@section('content')
@include('user.components.userInfo--index')
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($product as $product)
        @include('products.components.productCard--index')
    @endforeach
</ul>

<section class="reviewSection">
    <h2 class="reviewSection__text">Reviews<a href="/profile/{{$user->id}}/review"><i class="fas fa-plus"></i></h2>
</section>

<ul class="u-grid-12 u-grid-gap-2">
    @foreach($review as $review)
        @include('user.review')
    @endforeach
</ul>
@endsection