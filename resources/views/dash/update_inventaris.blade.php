@extends('dash/layouts/tamplateDash')

@section('content')

<div class="page-heading">
    <h3>Inventaris</h3>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">UPDATE INVENTARIS</h4>
        </div>
        <form action="{{route('update',$data->id)}}" method="post">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">NAMA</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}"
                                placeholder="Enter nama inventaris" required>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">JENIS</label>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="{{$data->jenis}}"
                                placeholder="Enter jenis inventaris" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">JUMLAH</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{$data->jumlah}}"
                                placeholder="Enter jumlah inventaris" required>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">TEMPAT</label>
                            <input type="text" class="form-control" name="tempat" id="tempat" value="{{$data->tempat}}"
                                placeholder="Enter tempat inventaris" required>
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
@endsection
