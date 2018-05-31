@extends('layouts.app')

@section('content')
    <section id="vue-app" class="pt-5" style="min-height: 100vh">
        <character-list inline-template>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                        <div class="pr-5">
                            <h4 id="filters" class="heading">Filters</h4>
                            <ul class="list--unstyle">
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#nameFilter" role="button" aria-expanded="false" aria-controls="nameFilter">
                                        Name
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="nameFilter">
                                        <input v-model="filters.name" title="Title filter" class="input input--block" type="text">
                                    </div>
                                </li>
                                <li>
                                    <a class="normalize-link no-decoration" data-toggle="collapse" href="#comicsFilter" role="button" aria-expanded="false" aria-controls="comicsFilter">
                                        Comics
                                        <span class="fas fa-chevron-circle-down"></span>
                                    </a>
                                    <div class="collapse pt-1" id="comicsFilter">
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
                        <template v-for="item in items">
                            <div class="row ">
                                <div class="col-6 col-sm-5 col-lg-4">
                                    <img class="img-fluid mb-2" :src="item.thumbnail.path + '/portrait_uncanny.' + item.thumbnail.extension" :alt="item.title">
                                </div>
                                <div class="col-6 col-sm-7 col-lg-8">
                                    <h5 class="heading ellipsis">
                                        <a class="normalize-link" :href="'/characters/' + item.id" :title="item.name">@{{ item.name }}</a>
                                    </h5>
                                    <p>
                                        @{{ item.description }}
                                    </p>
                                    <p>
                                        <b class="text-uppercase heading-2">Comics:&nbsp;</b>
                                        <a v-for="(comic, index) in item.comics.items.slice(0, 5)" class="normalize-link" href="#">@{{ comic.name }}@{{ index !== 4 ? ', ' : ''}}</a>
                                        <span v-if="!item.comics.items.length">No comics were found for this character.</span>
                                    </p>
                                    <p>
                                        <b class="text-uppercase heading-2">Events:&nbsp;</b>
                                        <a v-for="(event, index) in item.events.items.slice(0, 5)" class="normalize-link" href="#">@{{ event.name }}@{{ index !== 4 ? ', ' : ''}}</a>
                                        <span v-if="!item.events.items.length">No events were found for this character.</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </template>

                        <div v-if="loading" class="mb-5 d-flex justify-content-center">
                            <span class="fas fa-spinner fa-3x fa-spin"></span>
                        </div>
                        <div v-if="!loading && !items.length" class="mb-5 d-flex justify-content-center">
                            Could not find any results. Please adjust the filters.
                        </div>
                    </div>
                </div>
            </div>
        </character-list>
    </section>
@endsection
