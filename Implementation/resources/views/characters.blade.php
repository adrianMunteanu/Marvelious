@extends('layouts.app')

@section('content')
    <section class="pt-5" style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-4">
                    <h4 class="heading">Filters</h4>
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
                    @foreach(array_slice($characters, 0, 10) as $character)
                        <div class="row ">
                            <div class="col-6 col-sm-5 col-lg-4">
                                <img class="img-fluid" src="{{ $character->thumbnail->path }}/portrait_uncanny.{{ $character->thumbnail->extension }}" alt="{{ $character->name }}">
                            </div>
                            <div class="col-6 col-sm-7 col-lg-8">
                                <h5 class="heading ellipsis"><a class="normalize-link" href="{{ route('character', ['id' => $character->id]) }}">{{ $character->name }}</a></h5>
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
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
