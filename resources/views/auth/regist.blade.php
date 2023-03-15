@extends('auth/layouts/tamplateAuth')
    
@section('content')
<h1 class="auth-title">Sign Up</h1>
<p class="auth-subtitle mb-5">Input your data to register to our website.</p>
<div class="card" style="width: 100%">
    <div class="card-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/register" method="post" style="width:100%">
            @csrf
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">NIK</label>
                <div class="position-relative">
                    <input type="number" class="form-control" name="nik"
                        placeholder="Input your NIK"
                        id="first-name-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Full Name</label>
                <div class="position-relative">
                    <input type="text" class="form-control" name="name"
                        placeholder="Input your name"
                        id="first-name-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Department</label>
                <div class="position-relative">
                    <select class="form-select" id="jabatan" name="jabatan" required>
                        <option selected value="">Choose Department</option>
                        @foreach ($jabatan as $item)
                            {{-- {{ $ind = $loop->iteration}} --}}
                            <option value="{{$loop->iteration }}">{{ $item }}</option>
                        @endforeach

                        {{-- <option value="1">One</option> --}}
                        
                    </select>
                    
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="email-id-icon">Email</label>
                <div class="position-relative">
                    <input type="email" class="form-control" name="email"
                        placeholder="Email" id="email-id-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="mobile-id-icon">Mobile</label>
                <div class="position-relative">
                    <input type="number" class="form-control" name="mobile"
                        placeholder="Mobile" id="mobile-id-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="password-id-icon">Password</label>
                <div class="position-relative">
                    <input type="password" class="form-control" name="password"
                        placeholder="Password" id="password-id-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Birthday</label>
                <div class="position-relative">
                    <input type="date" class="form-control"
                        placeholder="Input with icon left" name="birthday"
                        id="first-name-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-calendar-day"></i>
                    </div>
                </div>
            </div>
            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Address</label>
                <div class="position-relative">
                    <input type="text" class="form-control" name="address"
                        placeholder="Input your Address"
                        id="first-name-icon" required>
                    <div class="form-control-icon">
                        <i class="bi bi-house"></i>
                    </div>
                </div>
            </div>

            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Religion</label>
                <div class="position-relative">
                    <select class="form-select" id="inputGroupSelect01" required name="religion"> 
                        <option selected value="">Choose Religion</option>
                        @foreach ($agama as $item)
                            {{-- {{ $ind = $loop->iteration}} --}}
                            <option value="{{$loop->iteration }}">{{ $item }}</option>
                        @endforeach

                        {{-- <option value="1">One</option> --}}
                        
                    </select>
                    
                </div>
            </div>

            <div class="form-group has-icon-left" style="width: 100%">
                <label for="first-name-icon">Gender</label>
                <div class="position-relative">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio2">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0" checked>
                        Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio3">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="1">
                        Female</label>
                      </div>
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