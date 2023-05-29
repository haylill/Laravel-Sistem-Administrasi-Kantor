@extends('auth/layouts/tamplateAuth')

@section('content')
<h1 class="auth-title">Reset Password.</h1>
<p class="auth-subtitle mb-5">Reset Password with your decision.</p>
@if (\Session::has('message'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('message') !!}</li>

    </ul>
</div>
@endif
<form action="/prosesreset" method="post">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" name="email" value="{{$email}}" hidden>
        <input type="password" class="form-control form-control-xl" name="password" placeholder="Input Your New Password">
        <div class="form-control-icon">
            <i class="bi bi-key-fill"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class="text-gray-600">have an account? <a href="/login"
            class="font-bold">Sign
            in</a>.</p>
</div>
@endsection
