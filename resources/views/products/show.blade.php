@extends('default')

@section('title')
    {{$product->name}}
@endsection

@section('content')
@include('products.components.productCard--show')
@endsection