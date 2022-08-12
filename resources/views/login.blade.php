@extends('Layout/isGuest')

@section('content')
    @if($message = session()->get('error'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @endif
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action={{ route('login_action') }}>
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" class="form-control form-control-lg" name="username" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" name="password" />
                        </div>
                        <div class="mb-4">
                            <p>Tidak punya akun? <a style="text-decoration: none;" href="/register">Daftar</a></p>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
