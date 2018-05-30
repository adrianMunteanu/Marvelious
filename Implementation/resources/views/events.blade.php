@extends('layouts.app')

@section('content')
    <section id=timeline>
        <div class="timeline-card-wrapper">

            @foreach(array_slice($comics, 0, 10) as $index => $comic)
                <div class="timeline-card timeline-card--step{{ $index + 1 }}">
                    <div class="head">
                        <div class="number-box">
                            <span>{{ $index < 9 ? '0' : '' }}{{ $index + 1 }}</span>
                        </div>
                        <h2><span class="small">Subtitle</span> Technology</h2>
                    </div>
                    <div class="body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
                        <img src="{{ $comic->thumbnail->path }}/landscape_incredible.{{ $comic->thumbnail->extension }}" alt="{{ $comic->title }}">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
