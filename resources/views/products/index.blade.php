@extends('default')

@section('title')
@if (Request::is('products'))
    Alle producten | Time for sharing!
@elseif (Request::is('my-products'))
    Mijn producten | Time for sharing!
@endif
@endsection

@section('content')
@include('search')
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($product as $product)
        @include('products.components.productCard--index')
    @endforeach
</ul>

@if (Request::is('my-products'))
<section class="loanedSection">
    <h2 class="loanedSection__text">Uitgeleende producten</h2>
</section>
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($accept as $accept)
        @include('products.components.loanedCard--index')
    @endforeach
</ul>
@endif
@endsection