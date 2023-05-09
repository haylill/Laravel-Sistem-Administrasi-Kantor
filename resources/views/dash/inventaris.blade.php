@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <h3>Inventaris</h3>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">ADD INVENTARIS</h4>
        </div>
        <form action="{{route('input')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">NAMA</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Enter nama inventaris">
                        </div>

                        <div class="form-group">
                            <label for="basicInput">JENIS</label>
                            <input type="text" class="form-control" name="jenis" id="jenis"
                                placeholder="Enter jenis inventaris">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">JUMLAH</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                placeholder="Enter jumlah inventaris">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">TEMPAT</label>
                            <input type="text" class="form-control" name="tempat" id="tempat"
                                placeholder="Enter tempat inventaris">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DATA INVENTARIS</h4>
                </div>
                <div class="card-content">
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>JENIS</th>
                                    <th>JUMLAH</th>
                                    <th>TEMPAT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventaris as $item)
                                <tr>
                                    <td class="text-bold-500">{{ $item->id }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-bold-500">{{ $item->jenis }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->tempat }}</td>
                                    <td><a href="{{route('hapus',$item->id)}}">Hapus</a> | <a href="{{route('show',$item->id)}}">Update</a></td>

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