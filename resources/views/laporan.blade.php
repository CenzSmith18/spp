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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">

                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
          
                if (isset(Auth::user()->level)) {
                   
                    
                    if(Auth::user()->level == "admin"){

                    
                    ?>
            <li class="nav-item">
                <a class="nav-link" href="/petugas">
                    <i class="fas fa-user-secret"></i>
                    <span>Petugas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/siswa">
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
            <li class="nav-item active">
                <a class="nav-link" href="/generate_laporan">
                    <i class="fas fa-fw  fa-file"></i>
                    <span>Generate Laporan</span></a>
            </li>
             <?php
                    }
                }

            ?>


            <li class="nav-item">
                <a class="nav-link" href="/pembayaran">
                    <i class="fas fa-fw  fa-dollar-sign"></i>
                    <span>Entri Transaksi Pembayaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/historipembayaran">
                    <i class="fas fa-fw  fa-file-invoice"></i>
                    <span>Histori Pembayaran</span></a>
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

                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                       

                        <!-- Nav Item - Alerts -->
                       

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal"  >
                                             
                                    
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
                    
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                         
                            <div class = "sisi-kanan">
                           
                           
                        </div>
                        <div class="card-body">
                            <div class="text-center">
     
                                <div style="margin-left:6rem;">
                                   <b><span class="text-header text-bold">
                                      PEMERINTAH DAERAH PROVINSI JAWA BARAT <br> DINAS PENDIDIKAN <br>
                                         <span class="size2">CABANG DINAS PENDIDIKAN WILAYAH IX</span> <br> 
                                         SEKOLAH MENENGAH KEJURUAN PRAKARYA INTERNASIONAL <br>
                                   </span></b>
                                   <span class="text-desc">Jalan Inhoftank No.46-146 Telepon (022) 5202834<br>Website <span class="underline">http://www.smk-pi.sch.id/</span> -  <br> Jl. Inhoftank No.46-146, Pelindung Hewan, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40243 <br> </span>
                                </div>    
                                </div>
                             <div>
                             <!-- /header -->
                             
                             <hr class="border">
                             
                             <!-- content -->
                             
                             <div class="size2 text-center mb-1">LAPORAN PEMBAYARAN SPP</div>
                             <a href="/generate_laporan/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                            <table class="table-center mb-1">
                                <thead>
                                   <tr>
                                      <th>Petugas</th>
                                      <th>Siswa</th>
                                      <th>Kelas</th>
                                      <th>Nominal Bayar</th>
                                     
                                      <th>Tanggal Bayar</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @foreach($pembayaran as $p)
                                   <tr>
                                      <td>{{$p->nama_petugas }}</td>
                                      {{-- @foreach($siswa as $v)
                                          @if ($p->nisn == $v->nisn)
                                          <td>{{ $v->nama }}</td>
                                          @endif
                                      
                                      @endforeach --}}
                                      <td>{{ $p->nama }}</td>
                                      <td>{{ $p->nama_kelas }}</td>
                                    
                                      <td>{{ $p->jumlah_bayar }}</td>
                                      <td>{{ $p->tgl_bayar}}</td>
                                     
                                   
                                   </tr>
                                   @endforeach
                                </tbody>
                          
                          
                          </table>
                             <!-- /content -->
                             
                             <!-- footer -->
                              <div>Pembuat : {{ Auth::user()->nama_petugas }}</div>
                             <!-- /footer -->

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="user" action="/tambah_kelas" method="post">
                    @csrf
                    <div class="modal-body"> 
                        <div class="form-group">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control form-control-user"
                                id="nama_kelas" name ="nama_kelas"
                                placeholder="Masukan Nama Kelas...">
                        </div>
                        <div class="form-group">
                        <label for="kompetensi" class="form-label">Kompetensi Keahlian</label>
                            <input type="text" class="form-control form-control-user"
                                id="kompetensi" name ="kompetensi_keahlian"
                                placeholder="Masukan Kompetensi Keahlian...">
                        </div>
                    </div>
               
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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