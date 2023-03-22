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
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Badge</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">Button</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">Card</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">Carousel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">Dropdown</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">List Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-modal.html">Modal</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-navs.html">Navs</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-pagination.html">Pagination</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-progress.html">Progress</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-spinner.html">Spinner</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-tooltip.html">Tooltip</a>
                                </li>
                            </ul>
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

                        
                        <li class="sidebar-title">Action</li>

                        <li class="sidebar-item  ">
                            <button type="button" class="btn btn-lg btn-block sidebar-link"data-bs-toggle="modal" data-bs-target="#info"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></button>
                            {{-- <button id="question" class="btn btn-lg btn-block sidebar-link"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></button>                    --}}
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
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