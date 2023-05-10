@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Salary Users</h3>
                <p class="text-subtitle text-muted">For Salary Users to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Salary</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Salary Users</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Salary</th>
                            <th>Bonus</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                           @foreach($gajis as $gaji)
                                @if ( $user->id_karyawan  == $gaji->id_karyawan)
                                    <tr>
                                            <td>{{$user->nik}}</td>
                                            <td>{{$user->nama}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->telp}}</td>
                                            <td>{{$gaji->gaji}}</td>
                                            <td>{{$gaji->bonus}}</td>                                
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#user{{$user->nik}}"><i class="bi bi-pencil-square"></i></button>                                                                                    
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
                                                        Edit Salary
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/salaryupdate" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <label>NIK </label>
                                                            <div class="form-group">
                                                                <input type="number" placeholder="Your NIK"
                                                                    class="form-control" name="nikupdate" value="{{$user->nik}}" readonly>
                                                            </div>                                                            
                                                            <label>Salary </label>
                                                            <div class="form-group">
                                                                <input type="number" placeholder="Your Salary"
                                                                    class="form-control" name="salaryupdate" value="{{$gaji->gaji}}">
                                                            </div>
                                                            <label>Bonus </label>
                                                            <div class="form-group">
                                                                <input type="number" placeholder="Your Bonus"
                                                                    class="form-control" name="bonusupdate" value="{{$gaji->bonus}}">
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