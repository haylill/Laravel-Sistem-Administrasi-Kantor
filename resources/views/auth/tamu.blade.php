@extends('auth/layouts/tamplateAuth')
    
@section('content')
<h1 class="auth-title">Guest Book</h1>

<form action="{{route('input')}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Enter nama">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Waktu Kunjung</label>
                        <input type="date" class="form-control" name="waktu_kunjung" id="waktu_kunjung"
                            placeholder="Enter waktu kunjung">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Jenis Kelamin</label>
                        <fieldset class="form-group">
                            <select class="form-select" id="jenkel" name="jenkel">
                                <option>Laki- Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </fieldset>
                    </div>                            
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Telp</label>
                        <input type="text" class="form-control" name="telp" id="telp"
                            placeholder="Enter telp">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-floating">
                    <textarea class="form-control"
                        id="alamat" name="alamat"></textarea>
                    <label for="floatingTextarea">Alamat</label>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group with-title mb-3">
                    <textarea class="form-control" id="tujuan" name="tujuan"
                        rows="3"></textarea>
                    <label>Tujuan</label>
                </div>
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<div class="text-center mt-5 text-lg fs-4">
<p class='text-gray-600'>You not A Guest? <a href="/login"
            class="font-bold">Back</a>.</p>
</div>
@endsection