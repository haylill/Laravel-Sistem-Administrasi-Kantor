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
                    <h4 class="card-title">Types</h4>
                    <p class='text-muted'>The type of the modal. SweetAlert comes with 5 built-in types
                        which will
                        show a corresponding icon animation: "warning", "error", "success" and "info".
                        You can also
                        set it as "input" to get a prompt modal. It can either be put in the object
                        under the key
                        "icon" or passed as the third parameter of the function.</p>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-12">
                            <button id="success"
                                class="btn btn-outline-success btn-lg btn-block">Success</button>
                        </div>
                        
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-md-6 col-12">
                            <button id="info"
                                class="btn btn-outline-info btn-lg btn-block">Info</button>
                        </div>
                        <div class="col-md-6 col-12">
                            <button id="question"
                                class="btn btn-outline-secondary btn-lg btn-block">Question</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection