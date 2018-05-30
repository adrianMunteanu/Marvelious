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
                <a id="discover" href="#filters" class="button button--large button--primary mr-3">
                    <span>Discover comics</span>
                </a>
                <a href="{{ route('characters') }}" class="button button--large button--hollow">
                    <span>Go to characters</span>
                </a>
            </div>
        </div>
    </section>

    <section id="vue-app" style="min-height: 100vh">
        <comic-list inline-template>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                        <div class="pr-5">
                            <h4 id="filters" class="heading">Filters</h4>
                            <ul class="list--unstyle">
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#titleFilter" role="button" aria-expanded="false" aria-controls="titleFilter">
                                        Title
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="titleFilter">
                                        <input v-model="filters.title" title="Title filter" class="input input--block" type="text">
                                    </div>
                                </li>
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#charactersFilter" role="button" aria-expanded="false" aria-controls="charactersFilter">
                                        Characters
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="charactersFilter">
                                        <input title="Characters filter" class="input input--block" type="text">
                                    </div>
                                </li>
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#seriesFilter" role="button" aria-expanded="false" aria-controls="seriesFilter">
                                        Series
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="seriesFilter">
                                        <input title="Series filter" class="input input--block" type="text">
                                    </div>
                                </li>
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#dateFilter" role="button" aria-expanded="false" aria-controls="dateFilter">
                                        Date Range
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="dateFilter">
                                        <input title="Date from" class="input input--block" type="text" placeholder="dd/mm/yyyy">
                                        <div class="text-center">to</div>
                                        <input title="Date to" class="input input--block" type="text" placeholder="dd/mm/yyyy">
                                    </div>
                                </li>
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#ratingFilter" role="button" aria-expanded="false" aria-controls="ratingFilter">
                                        Ratings
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="ratingFilter">
                                        <input title="Rating filter" class="input input--block" type="text">
                                    </div>
                                </li>
                            </ul>
                            <button @click.prevent="applyFilters" type="button" class="button button--hollow button--block mt-5">
                                Apply
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="row ">
                            <div v-for="item in items" class="col-lg-3 col-6 mb-4">
                                <a class="normalize-link d-block" :href="'/comics/' + item.id">
                                    <img class="img-fluid mb-2" :src="item.thumbnail.path + '/portrait_uncanny.' + item.thumbnail.extension" :alt="item.title">
                                </a>
                                <div class="heading ellipsis mb-0">
                                    <a class="normalize-link" :href="'/comics/' + item.id" :title="item.title">@{{ item.title }}</a>
                                </div>
                                <p>@{{ getCharacters(item) }}</p>
                            </div>
                        </div>
                        <div v-if="loading" class="mb-5 d-flex justify-content-center">
                            <span class="fas fa-spinner fa-3x fa-spin"></span>
                        </div>
                        <div v-if="!loading && !items.length" class="mb-5 d-flex justify-content-center">
                            Could not find any results. Please adjust the filters.
                        </div>
                    </div>
                </div>
            </div>
        </comic-list>
    </section>
@endsection
