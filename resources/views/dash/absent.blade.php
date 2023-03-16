@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <h3>Absent</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="justify-content-center text-center">
                        <h4 class="card-title">Date & Time</h4>
                        <span id="time"></span> 
                        <span id="day"></span>    
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12">
                            <form action="/absensi" method="post">
                                @csrf
                                <input type="hidden" name="id_karyawan" value="{{$id}}">
                                <button type="submit"
                                    class="btn btn-outline-success btn-lg btn-block" {{$absen == null? '' : 'disabled'}}>{{$absen == null? 'Absent' : 'You are absent For Today!'}}</button>
                            </form>
                        </div>
                        
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection