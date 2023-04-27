@extends('default')

@section('title')
    Home | Time for sharing!
@endsection

@section('content')
<article class="homeSection">
    <section class="homeSection__header">
        @if (Auth::check())
        <h2 class="homeSection__heading">Welkom <b class="homeSection__heading__user">{{Auth::user()->name}}!</b></h2>
        @else
        <h2 class="homeSection__heading">Time<b class="homeSection__heading__user">2</b>Share</h2>
        @endif
    </section>
    <section class="homeSection__description">
        <p class="homeSection__paragraph">Time2Share is het platform waar je elkaars spullen kan lenen. Dit hebben wij opgericht om voor elkaar te zorgen in goede- en slechte tijden. Leen jij ook producten?</p>
    </section>
    <section class="homeSection__button">
        <button class="homeSection__btn" onclick="window.location.assign('/products')">Bekijk het aanbod</button>
        @if (!Auth::check())
        <button class="homeSection__btn" onclick="window.location.assign('/register')">Registreer nu</button>
        @endif
    </section>
</article>
@endsection