@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Outgoing Mail</h3>
                <p class="text-subtitle text-muted">For Outgoing Mail to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Outgoing Mail</li>
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
                    Add Mail
                </button>
            </div>
            {{-- Modal Add Mail --}}
            <div class="modal fade text-left" id="inlineForm" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Add Mail</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/addmail" method="post" style="width:100%" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="first-name-icon">Letter Number</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="no_surat"
                                        placeholder="Input Letter Number"
                                        id="first-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="first-name-icon">Date on The Letter</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control" name="tgl_surat"
                                        placeholder="Input Date on The Letter"
                                        id="first-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-date-fill"></i>
                                    </div>
                                </div>
                            </div>                     
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="email-id-icon">Date of Receipt</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control" name="tgl_diterima"
                                        placeholder="Input Date of Receipt" id="email-id-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-check-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="mobile-id-icon">letter from</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="dari"
                                        placeholder="Input letter from" id="mobile-id-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-earmark-person-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="password-id-icon">letter to</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="kepada"
                                        placeholder="Input letter to" id="password-id-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-person-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="first-name-icon">the subject of the letter (About)</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Input the subject of the letter." name="perihal"
                                        id="first-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-earmark-ppt-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="jenis_surat" value="keluar">
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="first-name-icon">Attachments</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="lampiran"
                                        placeholder="Input Attachments, if no attachments please write (-) "
                                        id="first-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-files"></i>
                                    </div>
                                </div>
                            </div>                                                                                           
                            <div class="form-group has-icon-left" style="width: 100%">
                                <label for="first-name-icon">File</label>
                                <p>Format <b>pdf,docx,doc,png,jpg,jpeg</b> !</p>
                                <div class="position-relative">
                                    <input type="file"  name='file' accept=
                                    "application/msword, application/pdf, image/*"class="form-control">
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-arrow-down-fill"></i>
                                    </div>
                                </div>
                            </div>                                                                                           
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- End Add Mail --}}
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Letter Number</th>
                            <th>Date on The Letter</th>
                            <th>From</th>
                            <th>To</th>
                            <th>About</th>                            
                            <th>Attachments</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $mail)
                                <tr>
                                        <td>{{$mail->no_surat}}</td>
                                        <td>{{$mail->tgl_surat}}</td>
                                        <td>{{$mail->tgl_diterima}}</td>
                                        <td>{{$mail->dari}}</td>
                                        <td>{{$mail->kepada}}</td>
                                        <td>{{$mail->perihal}}</td>                                
                                        <td>{{$mail->lampiran}}</td>                                
                                        <td>
                                            <a href="/downloadfile/{{$mail->file}}">{{$mail->file}}</a>
                                        </td>                                
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#surat{{$mail->id}}"><i class="bi bi-pencil-square"></i></button>                                                                                    
                                            <form action="/inmaildelete/{{$mail->id}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this data?');" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                            {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" ><i class="bi bi-trash-fill"></i></i></button>                                                                                     --}}
                                        </td>
                                <tr>
                                <div class="modal fade text-left" id="surat{{$mail->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel130"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel130">
                                                    Edit Incoming Mail
                                                </h5>
                                                <button type="button" class="close"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/inmailup" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="id" value="{{$mail->id}}">
                                                    <div class="modal-body">
                                                        <label>Latter Number </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Your Latter Number"
                                                                class="form-control" name="no_update" value="{{$mail->no_surat}}">
                                                        </div>                                                            
                                                        <label>Date on The Letter </label>
                                                        <div class="form-group">
                                                            <input type="date" placeholder="Date on The Letter"
                                                                class="form-control" name="tglsurat_update" value="{{$mail->tgl_surat}}">
                                                        </div>
                                                        <label>Date of Receipt </label>
                                                        <div class="form-group">
                                                            <input type="date" placeholder="Your Date of Receipt"
                                                                class="form-control" name="tglterima_update" value="{{$mail->tgl_diterima}}">
                                                        </div>
                                                        <label>letter from</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="type letter from"
                                                                class="form-control" name="dari_update" value="{{$mail->dari}}">
                                                        </div>
                                                        <label>letter to</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="type letter to"
                                                                class="form-control" name="kepada_update" value="{{$mail->kepada}}">
                                                        </div>
                                                        <label>the subject of the letter (About)</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Your the subject of the letter (About)"
                                                                class="form-control" name="perihal_update" value="{{$mail->perihal}}">
                                                        </div>
                                                        <label>Attachments</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Your Attachments , if no attachments type (-)"
                                                                class="form-control" name="lampiran_update" value="{{$mail->lampiran}}">
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
                            @endforeach                                             
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection