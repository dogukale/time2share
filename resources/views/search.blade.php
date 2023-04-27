<section class="searchWrapper" id="js--searchBar">
    @if (Request::is('products'))
        @if ($product->isEmpty())
        <h2 class="searchWrapper__text">Er zijn geen producten te leen :(</h2>
        @else
        <h2 class="searchWrapper__text">Alle producten</h2>
        <input type="text" class="searchWrapper__searchBar" placeholder="Zoek een product...">
        @endif
    @elseif (Request::is('my-products'))
        @if ($product->isEmpty())
        <a class="searchWrapper__text--profile" href="/profile/{{Auth::user()->id}}">Ga naar profiel</a>
        <h2 class="searchWrapper__text">Je hebt geen producten<a href="{{ route('create') }}"><i class="fas fa-plus"></i></a></h2>
        @else
        <a class="searchWrapper__text--profile" href="/profile/{{Auth::user()->id}}">Ga naar profiel</a>
        <h2 class="searchWrapper__text">Mijn producten<a href="{{ route('create') }}"><i class="fas fa-plus"></i></a></h2>
        <input type="text" class="searchWrapper__searchBar" placeholder="Zoek in mijn producten...">
        @endif
    @elseif (Request::is('category'))
    <h2 class="searchWrapper__text">Categorieën</h2>
    <input type="text" class="searchWrapper__searchBar" placeholder="Zoek een categorie...">
    @elseif (Request::is('loaned'))
    <h2 class="searchWrapper__text">Geleende producten</h2>
    <input type="text" class="searchWrapper__searchBar" placeholder="Zoek in geleende producten...">
    @elseif (Request::is('all/loaned'))
    <h2 class="searchWrapper__text">Alle geleende producten</h2>
    @elseif (Request::is('all/users'))
    <h2 class="searchWrapper__text">Alle gebruikers</h2>
    
    @else
        @if (!$product->isEmpty())
        <h2 class="searchWrapper__text">{{$category->category}}</h2>
        <input type="text" class="searchWrapper__searchBar" placeholder="Zoek in {{$category->category}}...">
        @else
        <h2 class="searchWrapper__text">Er zijn geen producten in deze categorie :(</h2>
        @endif
    @endif
</section>