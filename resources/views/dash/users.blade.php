@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Users</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Add User
                </button>
                <!--login form Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                    Add User</h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/registeruser" method="post" style="width:100%">
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
                                            <input type="number" class="form-control" name="telp"
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
                                    
                                  
                        
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->nik}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telp}}</td>
                                <td>
                                    @if ($user->id_jabatan == 1)
                                        {{'Direktur'}}
                                    @elseif($user->id_jabatan == 2)
                                        {{'Manager'}}
                                    @elseif($user->id_jabatan == 3)
                                        {{'Staff'}}
                                    @endif
                                </td>
                                <td>{{$user->level}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#user{{$user->nik}}"><i class="bi bi-pencil-square"></i></button>                                    
                                    <form action="/userdelete/{{$user->nik}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="confirm('Are you sure to delete this data?')" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            <tr>
                                <div class="modal fade text-left" id="user{{$user->nik}}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel130"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title white" id="myModalLabel130">
                                                Logout
                                            </h5>
                                            <button type="button" class="close"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/userupdate" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <label>NIK </label>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Your NIK"
                                                            class="form-control" name="nikupdate" value="{{$user->nik}}" readonly>
                                                    </div>
                                                    <label>Level/Role </label>
                                                    <div class="form-group">
                                                        <select class="form-select" id="level" name="level" required>
                                                            <option selected value="">Choose Level</option>
                                                            <option value="Admin" {{$user->level=='Admin' ?'selected' :''}}>Admin</option>                                                            
                                                            <option value="User" {{$user->level=='User' ?'selected' :''}}>User</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Update</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach                                             
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection