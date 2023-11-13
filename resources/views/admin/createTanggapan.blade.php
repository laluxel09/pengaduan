<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lapor Pak <sup>!</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tabadmin') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Statistik Pengaduan</span></a>
            </li>


            <!-- Nav Item - Pengumuman -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengumuman') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pengumuman</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
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


                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                        </li>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tanggapi Pengaduan</h1>
                    @if (session()->has('message'))
                        <div class="alert alert-success position-absolute end-0">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="contact-form-body">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row px-2">
                                        <label for="judul">Judul Laporan</label>
                                        <input type="text" name="judul" id="contact-company"
                                            class="form-control mb-2" value="{{ $pengaduan->judul }}" disabled readonly>

                                        <label for="isi">Isi Laporan</label>
                                        <textarea name="isi" rows="3" class="form-control mb-2" id="contact-message" name="isi"
                                            placeholder="Tuliskan Isi Pengaduan..." style="resize: none; height: 100px;" disabled readonly>{{ $pengaduan->isi }}</textarea>

                                        <label for="lokasi">Lokasi Laporan</label>
                                        <input type="text" name="lokasi" id="contact-company"
                                            class="form-control mb-2" placeholder="Tuliskan Lokasi Pengaduan..."
                                            value="{{ $pengaduan->lokasi }}" disabled readonly required>

                                        {{-- <label for="lokasi">Kode Unik</label>
                                        <input type="text" name="kode" id="contact-company"
                                            class="form-control mb-2" placeholder="Tuliskan Kode Pengaduan..."
                                            value="{{ $pengaduan->kode }}" disabled readonly required> --}}

                                        <label for="lokasi">Tanggapan</label>
                                        <select class="form-control mb-2" aria-label="Default select example"
                                            name="tanggapan">
                                            <option selected>{{ $pengaduan->tanggapan }}</option>
                                            {{-- <option value="0">0 - Belum dibaca</option> --}}
                                            <option value="1">1 - Sudah dibaca</option>
                                            <option value="2">2 - Dalam pengerjaan</option>
                                            <option value="3">3 - Sudah Selesai</option>
                                        </select>




                                        <label for="isi">Foto Tanggapan</label>

                                        <input type="file" name="foto" id="contact-company"
                                            class="form-control mb-2" placeholder="Masukkan Foto Tanggapan..."
                                            required>
                                        <button type="submit"
                                            class="form-control fw-bold btn btn-warning btn-user btn-block ">Kirim
                                            Pengaduan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
