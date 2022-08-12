@extends('Layout/isUser')

@section('content')
    @if ($message = session()->get('failed'))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="card mx-auto" style="width: 50%">
        <div class="card-body p-4">
            <h4 class="mb-4">Tambah Artikel Baru</h4>
            <form method="POST" action={{ route('article_add_action') }}>
                @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title">
                        @error('title')
                            <i class="text-danger">*{{ $message }}</i>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description">
                        @error('description')
                            <i class="text-danger">*{{ $message }}</i>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tag" name="tag">
                        @error('tag')
                            <i class="text-danger">*{{ $message }}</i>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Buat Artikel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
