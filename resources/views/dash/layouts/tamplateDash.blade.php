<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/all.min.css')}}">    
    <link rel="icon" type="image/x-icon" href="{{asset('assets\img\illustrations\rocket-white.png')}}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/">
                                <p style="font-size:70% ;"><strong><i class="bi bi-flower1"></i> OFFICE ADMINISTRATION</strong></p>
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (\Session::has('message'))
                            <li class="sidebar-item">
                                <div class="alert alert-success alert-dismissible show fade">
                                    {!! \Session::get('message') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (\Session::has('error'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    {!! \Session::get('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>                 
                            </li>
                            @endif

                        <li class="sidebar-title">Menu</li>
                        
                        <li class="sidebar-item {{
                            Request::is('/') ? 'active' : ''
                        }} ">
                            <a href="/" class='sidebar-link '>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{
                            $title=='Absent | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/absent" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Absent</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{
                            $title=='Inventaris | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/inventaris" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Inventaris</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{
                            $title=='Buku Tamu | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/guest" class='sidebar-link'>
                                <i class="bi bi-book-half"></i>
                                <span>Guest Book</span>
                            </a>
                        </li>
                    

                        <li class="sidebar-item {{$title =='Users | Office Administration' ? 'active':''}}">
                            <a href="/users" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Users</span>
                            </a>                            
                        </li>

                        <li class="sidebar-item {{
                            $title=='Salary | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/salary-users" class='sidebar-link'>
                                <i class="bi bi-wallet-fill"></i>
                                <span>Salary Users</span>
                            </a>                          
                        </li>

                        <li class="sidebar-title">Management Data</li>

                        <li class="sidebar-item {{
                            $title=='Absence Management | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/management-absent" class='sidebar-link'>
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <span>Absence Management </span>
                            </a>                           
                        </li>

                       

                        <li class="sidebar-item  {{
                            $title=='Salary Management | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/salary-management" class='sidebar-link'>
                                <i class="bi bi-receipt"></i>
                                <span>Salary Management</span>
                            </a>                          
                        </li>
                        {{-- Letter Archives --}}
                        <li class="sidebar-title">Archive of Letters</li>

                        <li class="sidebar-item  {{
                            $title=='Incoming Mail | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/in-mail" class='sidebar-link'>
                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                <span>Incoming Mail</span>
                            </a>                          
                        </li>
                        <li class="sidebar-item  {{
                            $title=='Outgoing Mail | Office Administration' ? 'active' : ''
                        }}">
                            <a href="/out-mail" class='sidebar-link'>
                                <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                <span>Outgoing Mail</span>
                            </a>                          
                        </li>
                        
                        
                        <li class="sidebar-title">Action</li>
                                              
                        <li class="sidebar-item  ">
                            <button type="button" class="btn btn-lg btn-block sidebar-link"data-bs-toggle="modal" data-bs-target="#dadaf">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                  </svg>
                                <span>Edit Profile</span></button>                            
                        </li>
                        <li class="sidebar-item  ">
                            <button type="button" class="btn btn-lg btn-block sidebar-link"data-bs-toggle="modal" data-bs-target="#info">
                                <i class="bi bi-box-arrow-left">
                                    </i><span>Log Out</span></button>                            
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        
        <!--Edit Profile Modal -->
        <div class="modal fade text-left" id="dadaf" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel130"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel130">
                            Edit Profile
                        </h5>
                        <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/edituserutama" method="post">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control form-control-xl" name="nik" value="{{session('user')['nik']}}" readonly>
                                <div class="form-control-icon">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="editname">Name</label>
                                <input type="text" class="form-control form-control-xl" name="editname" placeholder="Input Your Correct Name" value="{{session('user')['nama']}}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="editemail">Email</label>
                                <input type="email" class="form-control form-control-xl" name="editemail" placeholder="Input Your Correct Email" value="{{session('user')['email']}}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="editphone">Phone</label>
                                <input type="number" class="form-control form-control-xl" name="editphone" placeholder="Input Your Correct Phone Number" value="{{session('user')['telp']}}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="editalamat">Address</label>
                                <input type="text" class="form-control form-control-xl" name="editalamat" placeholder="Input Your Correct Adress" value="{{session('user')['alamat']}}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-house"></i>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit"  class="btn btn-primary ml-1">
                                Accept
                            </button>
                        </form>
                        </div>
                    </div>
            </div>
        </div>

        <!--info theme Modal -->
        <div class="modal fade text-left" id="info" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel130"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel130">
                            Logout
                        </h5>
                        <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                       Are you sure you want to logout?
                    </div>
                    <div class="modal-footer">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" name="logout" class="btn btn-danger ml-1">
                                Accept
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; APL</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger">❤</span> by <a
                                href="https://github.com/haylill/Laravel-Sistem-Administrasi-Kantor">NPC</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>