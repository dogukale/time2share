<article class="card a-popup">
    <figure class="card__figure">
    <img class="card__image" src="{{$product->img_path}}" alt="{{$product->description}}"/>
    </figure>

    <section class="card__text">
        <p>{{$product->description}}</p>
        <a href="/profile/{{$product->owner}}">Profiel van adverteerder<i class="fas fa-arrow-right"></i></a>
    </section>

    <section class="card__btnSection">
        @if (Auth::check())
            @if ($product->loaned == 1)
            <button class="card__button" onclick="window.location.assign('/loaned/return/{{$product->id}}')">Geef terug</button>
            @elseif (Auth::user()->id != $product->owner)
            <button class="card__button" onclick="window.location.assign('/loaning/{{$product->id}}')">Leen dit product</button>
            @else
            <button class="card__ghostButton">Dit is jouw product</button>
            @endif
        @else
        <button class="card__button" onclick="window.location.assign('/loaning/{{$product->id}}')">Leen dit product</button>
        @endif
        <a class="card__back_to_home" href="{{ route('products') }}">Back to home</a>
    </section>
</article>