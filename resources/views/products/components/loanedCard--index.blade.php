<li class="a-popup u-list-style-none productCard">
    <a class="u-text-decoration-none" href="/products/{{$accept->id}}">
        <article>
            <header class="productCard__header u-flex-h-center u-flex-v-center">
                <h2 class="productCard__heading" id="js--cardHeader">{{$accept->name}}</h2>
            </header>
            <figure class="productCard__figure">
                <img class="productCard__image" src="{{$accept->img_path}}" alt="{{$accept->description}}">
            </figure>
            <section class="productCard__textSection u-flex-h-center u-flex-v-center">
                <p class="productCard__text">{{$accept->description}}</p>
                <button class="productCard__btn" onclick="window.location.assign('/loaned/accepted/{{$accept->id}}')">Accepteer</button>
            </section>
        </article>
    </a>
</li>