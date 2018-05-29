@extends('layouts.app')

@section('content')
    <section class="pt-5" style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="row ">
                        <div class="col-6 col-sm-5 col-lg-4">
                            <img class="img-fluid" src="{{ $character->thumbnail->path }}/portrait_uncanny.{{ $character->thumbnail->extension }}" alt="{{ $character->name }}">
                        </div>
                        <div class="col-6 col-sm-7 col-lg-8">
                            <h5 class="heading ellipsis"><a class="normalize-link" href="#">{{ $character->name }}</a></h5>
                            <p>
                                {{ $character->description }}
                            </p>
                            <p>
                                <b class="text-uppercase heading-2">Comics:&nbsp;</b>
                                @foreach(collect($character->comics->items)->pluck('name')->take(5) as $index => $item)
                                    <a class="normalize-link" href="#">{{ $item }}{{ $index !== 4 ? ', ' : ''}}</a>
                                @endforeach
                            </p>
                            <p>
                                <b class="text-uppercase heading-2">Series:&nbsp;</b>
                                @foreach(collect($character->series->items)->pluck('name')->take(5) as $index => $item)
                                    <a class="normalize-link" href="#">{{ $item }}{{ $index !== 4 ? ', ' : ''}}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        {{--<div class="glide" id="comics">--}}
                            {{--<div data-glide-el="track" class="glide__track">--}}
                                {{--<ul class="glide__slides">--}}
                                    {{--@foreach($comics as $comic)--}}
                                        {{--<li class="glide__slide">--}}
                                            {{--<img class="img-fluid" src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 mb-4">
                    <h4 class="heading mb-4">Related comics</h4>
                    <div class="row">
                        @foreach(array_slice($comics, 0, 4) as $comic)
                            <div class="col-6 mb-2">
                                <img class="img-fluid mb-1" src="{{ $comic->thumbnail->path }}/portrait_medium.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
                                <div class="heading-2">Name</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
