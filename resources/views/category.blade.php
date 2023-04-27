@extends('default')

@section('title')
    Categorieën | Time for sharing!
@endsection

@section('content')
@include('search')
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($category as $category)
        @include('products.components.categoryCard--index')
    @endforeach
</ul>
@endsection