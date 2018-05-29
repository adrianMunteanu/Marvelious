@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($comics as $comic)
                        <li class="glide__slide">
                            <img class="img-fluid" src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <hr>

<div class="container">
    <div class="row ">
        @foreach(array_slice($comics, 0, 6) as $comic)
            <div class="col-2">
                <img class="img-fluid" src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
                <h5>{{ $comic->title }}</h5>
            </div>
        @endforeach
    </div>
</div>
@endsection
