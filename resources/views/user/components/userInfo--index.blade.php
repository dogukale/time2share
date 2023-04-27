<section class="userSection">
    <h1 class="userSection__text--big">{{$user->name}}'s aanbod</h1>
    <p class="userSection__text--little">{{$user->email}}</p>

    <ul class="userSection__admin u-grid-9 u-grid-gap-2 u-flex-v-center u-flex-h-center">
        <li class="userSection__btn"><a href="{{ route('loaned') }}">Geleend</a></li>
        @if (Auth::user()->role == "Admin")
        <li class="userSection__btn"><a href="/all/users">Gebruikers</a></li>
        <li class="userSection__btn"><a href="/all/loaned">Producten</a></li>
        @endif
    </ul>
</section>