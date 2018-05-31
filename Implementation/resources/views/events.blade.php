@extends('layouts.app')

@section('content')
    <section id="vue-app" style="min-height: 100vh">
        <events-list inline-template>
            <div>
                <div v-if="items.length" id="timeline">
                    <div class="timeline-card-wrapper">
                        <div v-for="(item, index) in items" :class="'timeline-card timeline-card--step' + (index + 1)">
                            <div class="head">
                                <div class="number-box">
                                    <span>@{{ index < 9 ? '0' : '' }}@{{ index + 1 }}</span>
                                </div>
                                <h2><span class="small">@{{ new Date(item.start).getFullYear()  }}</span> @{{ item.title }}</h2>
                            </div>
                            <div class="body">
                                <p>@{{ truncate(item.description, { length: 143 }) }}</p>
                                <img :src="item.thumbnail.path + '/landscape_incredible.' + item.thumbnail.extension" :alt="item.title">
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="loading" class="mb-5 d-flex justify-content-center">
                    <span class="fas fa-spinner fa-3x fa-spin"></span>
                </div>
                <div v-if="!loading && !items.length" class="mb-5 d-flex justify-content-center">
                    Could not find any events.
                </div>
                <div v-html="getDynamicStyle()"></div>
            </div>
        </events-list>
    </section>
@endsection
