@extends('auth/layouts/tamplateAuth')
    
@section('content')
<h1 class="auth-title">Sign Up</h1>
<p class="auth-subtitle mb-5">Input your data to register to our website.</p>
<div class="card" style="width: 100%">
    <div class="card-content">
        <form action="/register" method="post" style="width:100%">
            @csrf
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">NIK</label>
                <div class="position-relative">
                    <input type="number" class="form-control"
                        placeholder="Input your NIK"
                        id="first-name-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Full Name</label>
                <div class="position-relative">
                    <input type="text" class="form-control"
                        placeholder="Input your name"
                        id="first-name-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Birthday</label>
                <div class="position-relative">
                    <input type="date" class="form-control"
                        placeholder="Input with icon left"
                        id="first-name-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-calendar-day"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Address</label>
                <div class="position-relative">
                    <input type="text" class="form-control"
                        placeholder="Input your Address"
                        id="first-name-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-house"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="email-id-icon">Email</label>
                <div class="position-relative">
                    <input type="text" class="form-control"
                        placeholder="Email" id="email-id-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="mobile-id-icon">Mobile</label>
                <div class="position-relative">
                    <input type="text" class="form-control"
                        placeholder="Mobile" id="mobile-id-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="password-id-icon">Password</label>
                <div class="position-relative">
                    <input type="password" class="form-control"
                        placeholder="Password" id="password-id-icon">
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
            </div>
            <div class='form-check'>
                <div class="checkbox mt-2">
                    <input type="checkbox" id="remember-me-v"
                        class='form-check-input' checked>
                    <label for="remember-me-v">Remember Me</label>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit"
                    class="btn btn-primary me-1 mb-1">Submit</button>
                <button type="reset"
                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
            </div>
        </form>
    </div>
</div>
<div class="text-center mt-5 text-lg fs-4">
    <p class='text-gray-600'>Already have an account? <a href="/login"
            class="font-bold">Log
            in</a>.</p>
</div>

@endsection