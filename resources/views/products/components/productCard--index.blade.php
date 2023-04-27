<li class="a-popup u-list-style-none productCard">
    <a class="u-text-decoration-none" href="/products/{{$product->id}}">
        <article>
            <header class="productCard__header u-flex-h-center u-flex-v-center">
                <h2 class="productCard__heading" id="js--cardHeader">{{$product->name}}</h2>
            </header>
            <figure class="productCard__figure">
                <img class="productCard__image" src="{{$product->img_path}}" alt="{{$product->description}}">
            </figure>
            <section class="productCard__textSection u-flex-h-center u-flex-v-center">
                <p class="productCard__text">{{$product->description}}</p>
                @if (Request::is('all/loaned'))
                <button class="productCard__btn" onclick="window.location.assign('/all/loaned/delete/{{$product->id}}')">Verwijder</button>
                @endif
            </section>
        </article>
    </a>
</li>