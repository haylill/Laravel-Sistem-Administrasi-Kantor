@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <h3>Guest Book</h3>
</div>

<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DATA GUEST</h4>
                </div>
                <div class="card-content">
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>WAKTU KUNJUNG</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>TELP</th>
                                    <th>EMAIL</th>
                                    <th>TUJUAN</th>
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
            </div>
        </div>
    </div>
</section>
@endsection