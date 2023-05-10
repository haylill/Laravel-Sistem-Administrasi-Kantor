@extends('auth/layouts/tamplateAuth')
    
@section('content')
<h1 class="auth-title">Forget Password.</h1>
<p class="auth-subtitle mb-5">Forget Password with your data that you entered during registration.</p>
@if (\Session::has('message'))
<div class="alert alert-danger">    
    <ul>
        <li>{!! \Session::get('message') !!}</li>
        
    </ul>
</div>
@endif


{{-- Make Loader Id Loader center up and bo and blur background --}}
<div id="loader" style="display: none; position: fixed; z-index: 999; height: 100%; width: 100%;  align-items: center; justify-content: center;  text-align: center;">
    <div class="spinner-border text-primary" role="status">
    </div>
    <span class="visually" style="color: orange">Loading Sending Process...</span>
</div>


<form action="/prosesforget" method="post" onsubmit="loadersub()">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" class="form-control form-control-xl" name="email" placeholder="Input Your Email">
        <div class="form-control-icon">
            <i class="bi bi-envelope-fill"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="submitforger">Submit</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class="text-gray-600">have an account? <a href="/login"
            class="font-bold">Sign
            in</a>.</p>
</div>
@endsection