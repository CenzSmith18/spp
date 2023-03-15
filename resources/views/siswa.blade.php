<!DOCTYPE html>
<html lang="en">

<head>



    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petugas">
                    <i class="fas fa-user-secret"></i>
                    <span>Petugas</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="/siswa">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Siswa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kelas">
                    <i class="fas fa-fw fa-school"></i>
                    <span>Kelas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/spp">
                    <i class="fas fa-fw  fa-dollar-sign"></i>
                    <span>SPP</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pembayaran">
                    <i class="fas fa-fw  fa-dollar-sign"></i>
                    <span>Entri Transaksi Pembayaran</span></a>
            </li>

            <!-- Divider -->


            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/siswa/cari" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Siswa Berdasarkan Nama..."
                                aria-label="Search" aria-describedby="basic-addon2" name ="cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                           
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name;}}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                    data-target="#logoutModal" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">


                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="tengah"><h1 class="m-0 font-weight-bold text-primary">Data Siswa</h1></div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                            <div class="sisi-kanan">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#siswaModal">
                                    Tambah Siswa
                                </button>

                            </div>
                            <div class="card-body">
                        

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nisn</th>
                                                <th>Nis</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Alamat</th>
                                                <th>No Telpon</th>
                                                <th>Id Spp</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($siswa as $p)
                                            <tr>
                                                <td>{{$p->nisn}}</td>
                                                <td>{{$p->nis}}</td>
                                                <td>{{$p->nama}}</td>
                                                <td>{{$p->nama_kelas}}</td>
                                                <td>{{$p->alamat}}</td>
                                                <td>{{$p->no_telp}}</td>
                                                <td>{{$p->id_spp}}</td>
                                             
                                                <td>

                                                    <a href="edit_siswa/{{$p->nisn}}"
                                                        class="btn btn-success btn-sm"><i class="fas fa-edit fa-fw"></i>
                                                    </a>
                                                    <a href="hapus_siswa/{{$p->nisn}}"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash fa-fw"></i>
                                                    </a>

                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                 
                                    {{ $siswa->links() }}
                                
                                    
                                </div>
                            </div>

                            <!-- End of Content Wrapper -->

                        </div>
                        <!-- End of Page Wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>

                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Logout" below if you are ready to end your current
                                        session.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="login.html">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="siswaModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form class="user" action="/tambah_siswa" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nisn" class="form-label">NISN</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="nisn" name="nisn"
                                                    placeholder="Masukan Nisn...">
                                            </div>
                                            <div class="form-group">
                                                <label for="nis" class="form-label">NIS</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="nis" name="nis"
                                                    placeholder="Masukan Nis...">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="nama" name="nama"
                                                    placeholder="Masukan Nama Siswa...">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kelas" class="form-label">Kelas</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="id_kelas" name="id_kelas"
                                                    placeholder="Masukan Id Kelas...">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="alamat" name="alamat"
                                                    placeholder="Masukan Alamat...">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp" class="form-label">No Telpon</label>
                                                <input type="number" class="form-control form-control-user"
                                                    id="no_telp" name="no_telp"
                                                    placeholder="Masukan No Telpon...">
                                            </div>
                                            <div class="form-group">
                                                <label for="Id Spp" class="form-label">Id Spp</label>
                                                <input type="number" class="form-control form-control-user"
                                                    id="id_spp" name="id_spp"
                                                    placeholder="Masukan Id Spp...">
                                            </div>  
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>




                        <!-- Bootstrap core JavaScript-->
                        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
                        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

                        <!-- Page level plugins -->
                        <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

                        <!-- Page level custom scripts -->
                        <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
                        <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
