@extends('layouts.app')

@section('content')
    <section style="height: calc(100vh - 90px)">
        <div class="glide slider--big">
            <div class="slider__arrows" data-glide-el="controls">
                <button class="slider__arrow slider__arrow--prev glide__arrow glide__arrow--prev" data-ref="fadereveal[el]" data-glide-dir="<">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M0 12l10.975 11 2.848-2.828-6.176-6.176H24v-3.992H7.646l6.176-6.176L10.975 1 0 12z"/>
                    </svg>
                </button>

                <button class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-ref="fadereveal[el]" data-glide-dir=">">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/>
                    </svg>
                </button>
            </div>

            <div class="frames glide__track" data-glide-el="track">
                <ul class="frames__list glide__slides">
                    @foreach($comics as $comic)
                        <li class="frames__item glide__slide">
                            <div class="frame" data-ref="frame">
                                {{--<img class="img-fluid" src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">--}}
                                <div style="background-image: url('{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}')"></div>
                                <div></div>
                                <div></div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="container">
            <h4 class="text-center home-lead mt-4">
                A easy to navigate and flexible website for all things Marvel. <br>
                All your favorite comics, characters and events. <br>
                No less, no more.
            </h4>

            <div class="button-wrapper">
                <a href="#filters" class="button button--large button--primary mr-3">
                    <span>Discover comics</span>
                </a>
                <a href="{{ route('characters') }}" class="button button--large button--hollow">
                    <span>Go to characters</span>
                </a>
            </div>
        </div>
    </section>

    <section style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-4">
                    <h4 id="filters" class="heading">Filters</h4>
                    <ul class="list--unstyle pr-5">
                        <li>
                            <a class="normalize-link no-decoration" data-toggle="collapse" href="#titleFilter" role="button" aria-expanded="false" aria-controls="titleFilter">
                                Title
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <div class="collapse pt-1" id="titleFilter">
                                <input class="input input--block" type="text">
                            </div>
                        </li>
                        <li>
                            <a class="normalize-link no-decoration" data-toggle="collapse" href="#charactersFilter" role="button" aria-expanded="false" aria-controls="charactersFilter">
                                Characters
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <div class="collapse pt-1" id="charactersFilter">
                                <input class="input input--block" type="text">
                            </div>
                        </li>
                        <li>
                            <a class="normalize-link no-decoration" data-toggle="collapse" href="#seriesFilter" role="button" aria-expanded="false" aria-controls="seriesFilter">
                                Series
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <div class="collapse pt-1" id="seriesFilter">
                                <input class="input input--block" type="text">
                            </div>
                        </li>
                        <li>
                            <a class="normalize-link no-decoration" data-toggle="collapse" href="#dateFilter" role="button" aria-expanded="false" aria-controls="dateFilter">
                                Date Range
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <div class="collapse pt-1" id="dateFilter">
                                <input class="input input--block" type="text">
                                <div class="text-center">to</div>
                                <input class="input input--block" type="text">
                            </div>
                        </li>
                        <li>
                            <a class="normalize-link no-decoration" data-toggle="collapse" href="#ratingFilter" role="button" aria-expanded="false" aria-controls="ratingFilter">
                                Ratings
                                <i class="fas fa-chevron-circle-down"></i>
                            </a>
                            <div class="collapse pt-1" id="ratingFilter">
                                <input class="input input--block" type="text">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12">
                    @foreach(array_chunk($comics, 4) as $row)
                        <div class="row ">
                            @foreach($row as $comic)
                                <div class="col-md-3 col-6 mb-4">
                                    <a class="normalize-link d-block" href="{{ route('comic', ['id' => $comic->id]) }}">
                                        <img class="img-fluid mb-2" src="{{ $comic->thumbnail->path }}/portrait_uncanny.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
                                    </a>
                                    <h6 class="heading ellipsis mb-0">
                                        <a class="normalize-link" href="{{ route('comic', ['id' => $comic->id]) }}" title="{{ $comic->title }}">{{ $comic->title }}</a>
                                    </h6>
                                    <p>{{ collect($comic->characters->items)->pluck('name')->take(2)->implode(', ') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
