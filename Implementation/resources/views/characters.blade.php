@extends('layouts.app')

@section('content')
    <section class="pt-5" style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-4">
                    <h4 class="heading">Filters</h4>
                    <ul class="list--unstyle pr-5">
                        <li>
                            Title
                            <i class="fas fa-chevron-circle-down"></i>
                        </li>
                        <li>
                            Characters
                            <i class="fas fa-chevron-circle-down"></i>
                        </li>
                        <li>
                            Series
                            <i class="fas fa-chevron-circle-down"></i>
                        </li>
                        <li>
                            Date Range
                            <i class="fas fa-chevron-circle-down"></i>
                        </li>
                        <li>
                            Ratings
                            <i class="fas fa-chevron-circle-down"></i>
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
