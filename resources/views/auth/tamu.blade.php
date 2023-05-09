@extends('auth/layouts/tamplateAuth')
    
@section('content')
<h1 class="auth-title">Guest Book</h1>
@if (\Session::has('message'))
<div class="alert alert-danger">    
    <ul>
        <li>{!! \Session::get('message') !!}</li>
        
    </ul>
</div>
@endif
<form action="{{route('input')}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
        <div class="form-group position-relative has-icon-left mb-4">

        <label for="basicInput">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama"
            placeholder="Enter nama">
        <label for="basicInput">Waktu Kunjung</label>
        <input type="date" class="form-control" name="waktu_kunjung" id="waktu_kunjung"
            placeholder="Enter waktu kunjung">
        <label for="basicInput">Jenis Kelamin</label>
        <fieldset class="form-group">
            <select class="form-select" id="jenkel" name="jenkel">
                <option>Laki- Laki</option>
                <option>Perempuan</option>
            </select>
        </fieldset>
        <label for="basicInput">Email</label>
        <small class="text-muted">eg.<i>someone@example.com</i></small>
        <input type="text" class="form-control" name="email" id="email"
            placeholder="Enter email">
        <label for="basicInput">Telp</label>
        <input type="text" class="form-control" name="telp" id="telp"
            placeholder="Enter telp">
        <label for="floatingTextarea">Alamat</label>
        <textarea class="form-control"
            id="alamat" name="alamat"></textarea>

        <label>Tujuan</label>
        <textarea class="form-control" id="tujuan" name="tujuan"
            rows="3"></textarea>

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
    </div>
</form>

<div class="text-center mt-5 text-lg fs-4">
<p class='text-gray-600'>You not A Guest? <a href="/login"
            class="font-bold">Back</a>.</p>
</div>
@endsection