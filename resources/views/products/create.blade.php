@extends('default')

@section('title')
    Maak een product aan!
@endsection

@section('content')
<article class="create-form a-popup">
    <form class="create-form__form" action="/my-products/created" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="create-form__section">
            <label for="name">Naam</label>
            <input class="create-form__input" name="name" id="name" type="text" required/>
        </section>

        <section class="create-form__section">
            <label for="kind">Categorie</label>
            <select class="create-form__input" name="category" id="category">
                @foreach($category as $category)
                    <option value="{{$category->category}}">{{$category->category}}</option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <label for="description">Beschrijving</label>
            <textarea class="create-form__input create-form__input--big" name="description" id="description" type="text" required></textarea>
        </section>

        <section class="create-form__section">
            <label for="deadline">Deadline:</label>
            <input type="date" class="create-form__input" name="deadline" id="deadline" required value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>"/>
        </section>

        <section class="create-form__section">
            <label for="image">Afbeelding</label><br />
            <input type="file" id="image" name="image" required>
        </section>

        <section class="create-form__section">
            <button class="create-form__button" type="submit">Product aanmaken</button>
        </section>
    </form>
</article>
@endsection