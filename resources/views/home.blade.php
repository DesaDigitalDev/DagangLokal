<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Home - Dagang Lokal</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/home/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('/home/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('/home/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/home/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">

    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('/home/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"><a href="/"> <img
                                            src="{{ asset('/home/images/Logoatas-01.png') }}" alt="img"
                                            width="500px" height="700px" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li> <a href="#myCarousel">Home</a> </li>
                                        <li> <a href="#about">About</a> </li>
                                        <li> <a href="#service">Service</a> </li>
                                        <li> <a href="#what-we-do">What We Do</a> </li>
                                        <li> <a href="#proses-kerja">Proses Kerja</a> </li>
                                        <li> <a href="#testimonial">Testimonial</a> </li>
                                        <li class="dropdown">
                                            @auth
                                                <a href="#" class="dropdown-toggle"
                                                    data-toggle="dropdown">{{ ucfirst(Auth::user()->name) }}</a>
                                                <ul class="dropdown-menu"
                                                    style="background-color: white; width:10px; height:80px;">
                                                    @if (Auth::user()->role_id == 1)
                                                        <li class="mb-2"><a
                                                                href="{{ $role }}admin/dashboard">Dashboard</a></li>
                                                    @elseif (Auth::user()->role_id == 2)
                                                        <li><a href="seller/dashboard">Dashboard</a></li>
                                                    @elseif (Auth::user()->role_id == 3)
                                                        <li><a href="producer/dashboard">Dashboard</a></li>
                                                    @endif
                                                    <li>
                                                        <form action="/logout" method="POST">
                                                            @csrf
                                                            <a href="#"
                                                                onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                                        </form>
                                                    </li>
                                                </ul>
                                            @else
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Join Us</a>
                                                <ul class="dropdown-menu">
                                                    <li class="mb-2"><a href="/login">Login</a></li>
                                                    <li><a href="/register">Sign Up</a></li>
                                                </ul>
                                            @endauth
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->

    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="{{ asset('/home/images/umkm-1.jpeg') }}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1 style="font-size: 40px"><span style="background-color: rgba(0,0,0,.7)"> Solusi UMKM di
                                    Indonesia </span> </h1>
                            <p>
                                <span style="background-color: rgba(0,0,0,.7)">
                                    Dagang Lokal sebagai meja penghubung UMKM dengan Reseller hadir dengan fitur
                                    fulfillment, di mana UMKM akan di bantu membuat produk layak dipasarkan dan membantu
                                    para Reseller/advertiser
                                    menyediakan produk ter-wining secara real time</span>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('/home/images/umkm-2.jpg') }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1 style="font-size: 40px"><span style="background-color: rgba(0,0,0,.7)"> Management
                                    System </span> </h1>
                            <p>
                                <span style="background-color: rgba(0,0,0,.7)">
                                    Teknologi Dagang Lokal akan menjadi solusi bagi pelaku UMKM yang memiliki
                                    keterbatasan pemasaran, di sisi lain Dagang Lokal hadir memaksimalkan potensi
                                    Teknologi Digital marketing. DAGANG LOKAL akan menjadi tempat bertemu pelaku UMKM
                                    dengan Para pakar pamasar profesional digital marketing
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('/home/images/umkm-3.jpg') }}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1 style="font-size: 40px"><span style="background-color: rgba(0,0,0,.7)"> UKM dan
                                    Fulfillment Marketing </span> </h1>
                            <p>
                                <span style="background-color: rgba(0,0,0,.7)">
                                    Dagang Lokal adalah perusahaan dan komunitas yang memiliki struktur management yang
                                    bagus, kontrol yang rapih, dan efisiensi kerja tinggi. Dagang Lokal dalam
                                    menghubungkan antar sistem memiliki suber daya manusia unggul yang memastikan
                                    sambungan komunikasi dari UMKM, Pemasar dan konsumen berjalan dengan baik.
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
            <a class="bottom_arrow_scroll" href="#about"><img src="{{ asset('/home/icon/errow.png') }}" /></a>
        </div>
    </section>

    <!-- about  -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flexcss">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-box">
                        <h3>Apa itu DAGANG LOKAL ? </h3>
                        <p>DAGANG LOKAL adalah startup yang memulai perjalanannya tahun 2020 dengan visi menjadi “oli”
                            dari ekonomi eCommerce Indonesia.
                            <br>
                            <br>
                            Dengan konsep menjadi wadah bagi para pelaku UMKM dan para advertiser, Dagang Lokal berharap
                            dapat membantu mengangkat produk lokal melalui bimbingan peningkatan kualitas, sekaligus
                            menjadi penyedia produk unggul bagi para advertiser atau reseller, yang pada gilirannya
                            menciptakan siklus perekonomian dan berakhir dengan terciptanya lapangan pekerjaan
                        </p>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-img">

                        <figure><img src="{{ asset('/home/images/shipping.jpeg') }}" alt="img" /></figure>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end abouts -->

    <!-- service -->
    <div id="service" class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Services</h2>
                        <span>Kami Tawarkan Layanan Kualitas Terbaik</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin-r-l">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <figure><img src="{{ asset('/home/images/service-1.jpg') }}" alt="#" />
                        </figure>
                        <b>Fulfillment</b>
                        <p>Sistem Dagang Lokal di mulai dari perbaikan kualitas produk,, testing pasar, penyerahan ke
                            Advertiser dan memastikan barang sampai ke tangan konsumen</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/service-2.jpg') }}" alt="#" />
                            </figure>
                            <b>Content</b>
                            <p>Produk akan dilakukan branding ulang, bersamaan engan pembuatan konten promosi seperti
                                konten web (landing page), Copywriting, Gambar promosi, Video.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/service-3.jpg') }}" alt="#" />
                            </figure>
                            <b>Management</b>
                            <p>Kontrol management meliputi Tim Cs, CRM, Tim Gudang, Audit dan ekspedisi menjadi bagian
                                yang sangat penting untuk menunjang proses berjalan dengan lancar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end service -->


    <!-- what we do  -->
    <div id="what-we-do" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>What We Do?</h2>
                        <span>Apa saja yang kami lakukan?</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flexcss">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-img">

                        <figure><img src="{{ asset('/home/images/dagang-lokal2.jpg') }}" alt="img" /></figure>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-box">
                        <h3>Kenapa Dagang Lokal</h3>
                        <b>Efisiensi</b>
                        <p>
                            Dagang Lokal akan membantu Anda melakukan efisiensi waktu, energi, biaya, dan tenaga kerja.
                            Kepercayaan
                            Kami sudah bekerjasama dengan lebih dari 100 UMKM dan Advertiser, semua masalah dalam
                            kerjasama menjadi tanggung jawab Dagang Lokal
                        </p>
                        <br>
                        <b>Kecepatan</b>
                        <p>
                            Dengan staf terlatih dan sistem berbasis teknologi yang canggih, baik UMKM ataupun
                            Advertiser dapat dengan mudah terhubung dengan Dagang Lokal
                        </p>
                        <br>
                        <b>Kepercayaan</b>
                        <p>
                            Kami sudah bekerjasama dengan lebih dari 100 UMKM dan Advertiser, semua masalah dalam
                            kerjasama menjadi tanggung jawab Dagang Lokal
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end what we do -->

    <!-- proses kerja -->
    <div id="proses-kerja" class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Proses Kerja</h2>
                        <span>Berikut adalah alur proses kerja di dagang lokal</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin-r-l">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <figure><img src="{{ asset('/home/images/umkm.jpg') }}" alt="#" />
                        </figure>
                        <b>UMKM</b>
                        <p>Menjalin kerjasama dengan UMKM dan perbaikan kualitas produk</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/testing.jpg') }}" alt="#" />
                            </figure>
                            <b>Testing</b>
                            <p>Dagang Lokal akan melakukan tes pasar terhadap produk-produk kerjasama UMKM</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/advertiser.jpg') }}" alt="#" />
                            </figure>
                            <b>Advertiser</b>
                            <p>Produk-produk dengan respon postif akan di berikan kepada advertiser bersamaan dengan
                                konten promosi berbasis FB Ads, Google Ads, Tiktok Ads</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/customer.jpg') }}" alt="#" />
                            </figure>
                            <b>Konsumen</b>
                            <p>Segala proses permintaan produk oleh konsumen, advertiser akan mmberi info ke tim Dagang
                                lokal, bahwa ia telah berhasil menjual produk dengan data konsumen lengkap.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/sending.jpg') }}" alt="#" />
                            </figure>
                            <b>Pengiriman</b>
                            <p>Setelah menerima invoice dari advertiser, Tim Cs Dagang Loal akan melapor ke Tim gudang
                                Dagang untuk melakukan pengiriman ke konsumen</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 thumb">
                    <div class="service-box">
                        <div class="service-box">
                            <figure><img src="{{ asset('/home/images/report.jpg') }}" alt="#" />
                            </figure>
                            <b>Laporan</b>
                            <p>Laporan akhir yaitu ketika barang telah berhasil ke tangan konsumen, jika terjadi kendala
                                selama proses pengiriman, menjadi tanggung jawab Dagang Lokal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end proses kerja -->

    <!-- testimonial  -->
    <div id="testimonial" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Testimonial</h2>
                        <span>Apa kata mereka tentang dagang lokal?</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flexcss">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-box">
                        <h3>Cerita Klien Tentang Dagang Lokal</h3>
                        <p>Sangat memudahkan kami sebagai seller. Praktis, dan kami bisa fokus ke marketingnya, yang
                            brasa Waktu habis untuk packing dan kirim baran Serta weekeend pun masih bisa termina order
                            dan Langsung kirim
                        </p>
                        <b>- Taman Store</b>
                        <br>
                        <p>Setelah Pakai DAGANG LOKAL produk tidakada yang nganggur bahkan kami yang sering kewalahan
                            dengan permintaan Dagang Lokal. Good luck buat DAGANG LOKAL
                        </p>
                        <b>- Anna Stik Pisang</b>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="about-img">

                        <figure><img src="{{ asset('/home/images/testimoni.jpg') }}" alt="img" /></figure>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end Testimonial -->

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Phone</h3>
                            <i><img src="{{ asset('/home/icon/phone.png') }}">+62 813-1584-5094</i>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Email</h3>
                            <i><img src="{{ asset('/home/icon/mail.png') }}">info@daganglokal.com</i>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Social Media </h3>
                            <ul class="contant_icon">
                                <li><a href="https://facebook.com/daganglokalofficial"><img
                                            src="{{ asset('/home/icon/fb.png') }}" alt="icon" /></a></li>
                                <li><a href="https://instagram.com/daganglokal.co"><img
                                            src="{{ asset('/home/icon/instagram.png') }}" alt="icon" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright 2023 All Right Reserved By <a href="https://daganglokal.com/">Dagang Lokal</a></p>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Javascript files-->
    <script src="{{ asset('/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('/home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/home/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('/home/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('/home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="{{ asset('/home/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>
