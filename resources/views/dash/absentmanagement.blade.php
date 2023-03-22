@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Absent Users</h3>
                <p class="text-subtitle text-muted">For Absent Users to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Absence Management</li>
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
                    Download Absent to CSV
                </button>
                <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                    Select Time</h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/export-absent" method="post" style="width:100%">
                                    @csrf
                                    <div class="form-group has-icon-left" style="width: 100%">
                                        <label for="first-name-icon">Date</label>                                        
                                        <div class="form-group">
                                            <select class="form-select" id="date" name="date" required>
                                                <option selected value="all">All The Time</option>
                                                @foreach($date as $d)
                                                    <option value="{{$d}}">{{$d}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
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
                            <th>Department</th>
                            <th>Date & Time</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                           @foreach($absens as $absen)
                                @if ( $user->id_karyawan  == $absen->id_karyawan)
                                    <tr>
                                            <td>{{$user->nik}}</td>
                                            <td>{{$user->nama}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if ($user->id_jabatan == 1)
                                                    {{'Direktur'}}
                                                @elseif($user->id_jabatan == 2)
                                                    {{'Manager'}}
                                                @elseif($user->id_jabatan == 3)
                                                    {{'Staff'}}
                                                @endif
                                            </td>
                                            <td>{{$absen->created_at}}</td>                                            
                                    <tr>                                    
                                @endif
                            @endforeach                                             
                        @endforeach                                             
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection