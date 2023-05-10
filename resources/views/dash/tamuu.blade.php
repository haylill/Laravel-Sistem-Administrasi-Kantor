@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Guests</h3>
                <p class="text-subtitle text-muted">For Data Guest to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Guest</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">                
                <h4 class="card-title mb-3">Data Guests</h4>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#inlineForm">
                    Download Data Guests to CSV
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
                                <form action="/export-guest" method="post" style="width:100%">
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
                            <th>ID</th>
                            <th>NAME</th>
                            <th>VISIT TIME</th>
                            <th>GENDER</th>
                            <th>ADDRESS</th>
                            <th>TELP</th>
                            <th>EMAIL</th>
                            <th>OBJECTIVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tamu as $item)
                        <tr>
                            <td class="text-bold-500">{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-bold-500">{{ $item->waktu_kunjung }}</td>
                            <td>{{ $item->jenkel }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tujuan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection