@extends('Layout/isUser')

@section('content')
    @if ($message = session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Artikel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="dataTable_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable">
                                    <tr>
                                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 5%;">Id</th>
                                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 20%;">Title</th>
                                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 45%;">Description</th>
                                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 10%;">Tag</th>
                                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 20%;">Action</th>
                                    </tr>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td colspan="1" rowspan="1">{{ $article->id }}</td>
                                            <td colspan="1" rowspan="1">{{ $article->title }}</td>
                                            <td colspan="1" rowspan="1">{{ $article->description }}</td>
                                            <td colspan="1" rowspan="1">{{ $article->tag }}</td>
                                            <td colspan="1" rowspan="1">
                                                <div class="container text-center">
                                                    <div class="row">
                                                        <div class="col">
                                                            <a class="btn btn-primary m-2"
                                                                href="/article/edit/{{ $article->id }}">Edit</a>
                                                        </div>
                                                        <div class="col mt-2">
                                                            <form method="POST"
                                                                action={{ route('article_delete_action') }}>
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value={{ $article->id }} />
                                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
