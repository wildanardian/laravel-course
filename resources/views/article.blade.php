@extends('Layout/isGuest')

@section('content')
    <div class="container mx-auto">
        <div class="mt-4">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-dark" style="text-decoration: none;"
                            href="/article/{{ $article->id }}">{{ $article->title }}</a>
                    </h5>
                    <p class="card-text">{{ $article->description }}</p>
                    <span class="badge text-bg-primary">{{ $article->tag }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
