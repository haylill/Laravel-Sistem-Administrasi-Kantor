@extends('dash/layouts/tamplateDash')
    
@section('content')

<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-14">                                                                            
                                        <h2 class="text-center font-semibold">Be Smart And Creative !</h2>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body py-4 px-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="https://media.tenor.com/NICoVNbKVGYAAAAM/profile-picture.gif" alt="Your Face">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{session('user')['nama']}}</h5>
                            <p class="text-muted mb-0">@ {{session('user')['email']}}</p>
                        </div>
                    </div>
                </div>
            </div>           
        </div>


        <div class="col-12 col-lg-8">
            <div class="card m-2">
                <h2 class="text-center">Sample Office Administrator Responsibities</h2>                        
                    <div class="card m-2">
                        <p >Oversee daily schedules and appointments organize company events and replace office supplies.Office Administrators typically report to senior-level staff members, like the Chief Executive of Operations or other executive team members. These employees will often assign them their daily tasks and will answer any complex organizational questions the Office Administrator may have for them. </p>
                    </div>
            </div>

            <div class="card m-2">
                    <div class="card m-2">
                        <p class="m-2">"To be the centre of excellence for knowledge, technology, and culture which is competitive, through the effort to educate and increase the prosperity of the people, and contribute to the development of the people of Indonesia and the world."</p>
                    </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <img src="https://www.officelovin.com/wp-content/uploads/2019/01/squeeze-studio-animation-office-6.jpg" alt="Gambar Dashboard" width="100%" >                
        </div>

    </section>
</div>
@endsection