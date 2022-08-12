@extends('Layout/isGuest')

@section('content')
    <div class="container mx-auto">
        <div class="mt-4">
            @foreach ($articles->reverse() as $article)
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-dark" style="text-decoration: none;"
                                href="/article/{{ $article->id }}">{{ $article->title }}</a>
                        </h5>
                        <span class="badge text-bg-primary">#{{ $article->tag }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
