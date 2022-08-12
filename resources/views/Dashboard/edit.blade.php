@extends('Layout/isUser')

@section('content')
    <div class="card mx-auto" style="width: 50%">
        <div class="card-body p-4">
            <h4 class="mb-4">Edit Artikel</h4>
            <form method="POST" action={{ route('article_edit_action', $article->id) }}>
                @csrf
                @method('PUT')
                <input type="hidden" value={{ $article->id }}>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="{{ $article->title }}">
                        @error('title')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="{{ $article->description }}">
                        @error('description')
                            <i class="text-danger">*{{ $message }}</i>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tag" name="tag"
                            placeholder="{{ $article->tag }}">
                        @error('tag')
                            <i class="text-danger">*{{ $message }}</i>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Edit Artikel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
