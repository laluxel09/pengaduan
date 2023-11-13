<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/templatemo-festava-live.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

</head>

<body>

    <main>

        <header class="site-header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-person custom-icon me-2"></i>
                            <strong class="text-dark">Selamat Datang di Website Layanan Pengaduan Masyarakat</strong>
                        </p>
                    </div>

                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <a class="navbar-brand" href="index.blade.php">
                    Lapor Pak!
                </a>

                <a href="{{ route('auth.login') }}" class="btn custom-btn d-lg-none ms-auto me-4">Login</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Statistik</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Pengumuman</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Tentang</a>
                        </li>
                    </ul>

                    <a href="{{ route('auth.login') }}" class="btn custom-btn d-lg-block d-none">Login</a>
                </div>
            </div>
        </nav>


        <section class="hero-section bg-dark " id="section_1">
            <div class="section-overlay"></div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row justify-content-center">

                    <div class="col-12 mt-auto mb-5 text-center">

                        <h2 class="text-white">Layanan Pengaduan Masyarakat</h2>
                        <div class="tab-content shadow-lg mt-3" id="nav-tabContent">
                            <div class="tab-panel fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0"
                                    action="{{ route('pengaduan.store') }}" method="POST" role="form">
                                    @csrf
                                    <div class="contact-form-body">
                                        <div class="row">
                                            @error('judul')
                                                <p class="text-danger text-start m-0">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="judul" id="contact-company"
                                                class="form-control  @error('judul') is-invalid @enderror"
                                                placeholder="Tuliskan Judul Pengaduan..." required>

                                            @error('isi')
                                                <p class="text-danger text-start m-0">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="isi" id="contact-company"
                                                class="form-control  @error('isi') is-invalid @enderror"
                                                placeholder="Tuliskan Isi Pengaduan..." required>

                                            @error('lokasi')
                                                <p class="text-danger text-start m-0">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="lokasi" id="contact-company"
                                                class="form-control  @error('lokasi') is-invalid @enderror"
                                                placeholder="Tuliskan Lokasi Pengaduan..." required>

                                            <div class="col-lg-5 col-md-11 col-9 mx-auto">
                                                <button type="submit" class="form-control fw-bold">Kirim
                                                    Pengaduan</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

        </section>






        <section class="schedule-section section-padding" id="section_2" style="background-color: #f5c4df">
            <div class="container ">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-dark mb-2 ">Statistik Pengaduan</h1>
                            {{-- <b>Ketikkan kode unik yang
                                anda masukkan pada saat melakukan pengaduan </b>
                                <br>
                                <br>
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 p"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button> --}}
                    </div>
                </div>
                </form>
                <br>
                <br>
                <div class="table-responsive">
                    <table id="tabel-hapsari" class="schedule-table table table-dark">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Judul Pengaduan</th>
                                <th scope="col">Isi Pengaduan</th>
                                <th scope="col">Lokasi Pengaduan</th>
                                <th scope="col">Tanggapan</th>
                                <th scope="col">Foto Tanggapan</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengaduans as $value)
                                <tr>
                                    <td scope="row ">{{ $loop->iteration }}</td>

                                    <td class="table-background-image-wrap pop-background-image"
                                        style="background-color: transparent">
                                        <div class="d-flex justify-content-start">
                                            <div class="mb-2" style="z-index: 2">
                                                {{ $value->judul }}
                                            </div>
                                        </div>

                                        <div class="section-overlay"></div>
                                    </td>

                                    <td class="table-background-image-wrap pop-background-image"
                                        style="background-color: transparent">
                                        <div class="d-flex justify-content-start">
                                            <div class="mb-2" style="z-index: 2">
                                                {{ $value->isi }}
                                            </div>
                                        </div>

                                        <div class="section-overlay"></div>
                                    </td>

                                    <td class="table-background-image-wrap pop-background-image"
                                        style="background-color: transparent">
                                        <div class="d-flex justify-content-start">
                                            <div class="mb-2" style="z-index: 2">
                                                {{ $value->lokasi }}
                                            </div>
                                        </div>

                                        <div class="section-overlay"></div>
                                    </td>


                                    <td class="table-background-image-wrap pop-background-image"
                                        style="background-color: transparent">

                                        <div class="d-flex justify-content-start">
                                            <div style="z-index: 2">

                                                @if ($value->tanggapan == 0)
                                                    Belum Dibaca
                                                @elseif ($value->tanggapan == 1)
                                                    Sudah Dibaca
                                                @elseif ($value->tanggapan == 2)
                                                    Dalam Pengerjaan
                                                @elseif ($value->tanggapan == 3)
                                                    Sudah Selesai
                                                @endif
                                                </>
                                            </div>
                                        </div>

                                        <div class="section-overlay"></div>
                                    </td>

                                    <td class="table-background-image-wrap pop-background-image"
                                        style="background-color: transparent; width: 25%">
                                        <div class="d-flex justify-content-center">
                                            @if ($value->foto_tanggapan)
                                                <img class="img-fluid w-75" style="z-index: 2"
                                                    src="{{ asset('storage/gambar/' . $value->foto_tanggapan) }}"
                                                    alt="">
                                            @else
                                                <div style="z-index: 2">
                                                    No Image Found.
                                                </div>
                                            @endif
                                        </div>
                                        <div class="section-overlay"></div>


                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
        </section>

        <section class="schedule-section section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Pengumuman</h1>

                            <div class="table-responsive">
                                <table id="tabel-pengumuman" class="schedule-table table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul Pengumuman</th>
                                            <th scope="col">Isi Pengumuman</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pengumuman as $value)
                                            <tr>
                                                <td scope="row ">{{ $loop->iteration }}</td>

                                                <td class="table-background-image-wrap pop-background-image"
                                                    style="background-color: transparent">
                                                    <p>{{ $value->judul }}</p>

                                                    <div class="section-overlay"></div>
                                                </td>

                                                <td class="table-background-image-wrap pop-background-image"
                                                    style="background-color: transparent">
                                                    <p>{{ $value->isi }}</p>

                                                    <div class="section-overlay"></div>
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="about-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">Tentang Lapor Pak !</h2>

                            <p class="text-white">Aplikasi Layanan Pengaduan Masyarakat Berbasis Web adalah sebuah
                                sistem informasi pengaduan masyarakat yang digunakan untuk memudahkan masyarakat dalam
                                mengadukan masalah – masalah yang terjadi secara online. </p>

                            <h6 class="text-white mt-4">Terimakasih Telah Menggunakan Website Lapor Pak!</h6>

                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="{{ asset('assets/images/Lapor.png') }}" class="about-image img-fluid">
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>


        <footer class="site-footer">
            <div class="site-footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="text-white mb-lg-0">Lapor Pak!</h2>
                        </div>

                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                            <ul class="social-icon d-flex justify-content-lg-end">
                                <li class="social-icon-item">
                                    <a href="https://wa.me/62881027646840" class="social-icon-link">
                                        <span class="bi-whatsapp"></span>
                                    </a>
                                </li>


                                <li class="social-icon-item">
                                    <a href="https://instagram.com/hapsariainii?igshid=OGQ5ZDc2ODk2ZA=="
                                        class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://youtube.com/@hapsarinuraini?si=bjW7GrBoxEvi1Bqy"
                                        class="social-icon-link">
                                        <span class="bi-youtube"></span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">


                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <h5 class="site-footer-title mb-3">Ada Pertanyaan?</h5>

                        <p class="text-white d-flex mb-1">
                            <a href="tel:+62 882 0276 46840" class="site-footer-link">
                                +62 881 0276 46840
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:happyaini06@gmail.com" class="site-footer-link">
                                happyaini06@gmail.com
                            </a>
                        </p>

                    </div>

                    <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">

                        <h5 class="site-footer-title mb-3">Lokasi</h5>

                        <p class="text-white d-flex mt-3 mb-2">
                            SMKN 1 Surabaya</p>

                        <a class="link-fx-1 color-contrast-higher mt-3"
                            href="https://maps.app.goo.gl/6TgE1x7ekH8tE7GF9">
                            <span>Our Maps</span>
                            <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="16" cy="16" r="15.5"></circle>
                                    <line x1="10" y1="18" x2="16" y2="12"></line>
                                    <line x1="16" y1="12" x2="22" y2="18"></line>
                                </g>
                            </svg>
                        </a>


                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12 mt-5">
                            <p class="copyright-text">Copyright © 2023 Lapor Pak! Company</p>
                        </div>

                        <div class="col-lg-8 col-12 mt-lg-5">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Privacy Policy</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <link href="{{ asset('vendor/DataTables1/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

        <script src="{{ asset('vendor/DataTables1/js/dataTables.bootstrap5.min.js') }}"></script>

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/click-scroll.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready(function() {
                $('#tabel-hapsari').DataTable();
                $('#tabel-pengumuman').DataTable();
            });
        </script>


</body>

</html>
