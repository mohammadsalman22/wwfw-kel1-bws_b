@extends('frontend.template')
@section('content')
    <!-- Carousel Start -->
    <div id='beranda' class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('frontend/img/sempol.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Paket Wisata Lokal</h4>
                            <h1 class="display-3 text-white mb-md-4">Cari Destinasi Liburanmu Disini</h1>
                            <a href='#download' class="btn btn-primary py-md-3 px-md-5 mt-2">Ayo Pesan</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('frontend/img/museumkereta.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Simpel dan Nyaman</h4>
                            <h1 class="display-3 text-white mb-md-4">Pilihan Paket Yang Lengkap Dan Aman</h1>
                            <a href='#download' class="btn btn-primary py-md-3 px-md-5 mt-2">Ayo Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Pilih Paket</option>
                                        <option value="1">Paket Hemat</option>
                                        <option value="2">Paket Keluarga</option>
                                        <option value="3">Paket SUper</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Berangkat" data-target="#date1" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pulang" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Jumlah</option>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                        <option value="3">3 Orang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href='#download' class="btn btn-primary py-md-3 px-md-5 mt-2">cari</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- About Start -->
    <div id='tentang' class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('frontend/img/gijen.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">BookWisata</h6>
                        <h1 class="mb-3">Destinasi Wisata Yang Dikemas Menjadi Satu Paket</h1>
                        <p>Merupakan aplikasi penyedia pilihan wisata yang dimana dikemas dengan paket yang telah tersedia demi kemudahan memilih tujuan wisata</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('frontend/img/transportasi.jpg') }}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('frontend/img/penginapan.jpg') }}" alt="">
                            </div>
                        </div>
                        <a href="" class="btn btn-primary mt-1">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Mudahnya Berwisata</h5>
                            <p class="m-0">Dengan adanya pilihan paket mempercepat anda dalam berwisata</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Pelayanan Terbaik</h5>
                            <p class="m-0">Pilihan paket yang tersedia sudah memiliki pelayanan yang terbaik</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Destinasi Menarik</h5>
                            <p class="m-0">Tempat wisata yang tersedia merupakan tempat yang bagus dan indah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Destination Start -->
    <div id='galeri' class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Galeri</h6>
                <h1>Dokumentasi Pengguna</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri6.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Wisata</h5>
                            <span>Sempol</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri2.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Transportasi</h5>
                            <span>Mobil</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri3.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Wisata</h5>
                            <span>Pemandangan Arak-arak</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri4.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Penginapan</h5>
                            <span>Hotel Palm</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri5.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Wisata</h5>
                            <span>Tirta Agung</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/galeri1.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Transportasi</h5>
                            <span>Mobil</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Service Start -->
    <div id='pilihanpaket' class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Servis</h6>
                <h1>Paket Wisata Lokal</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Wisata Alam</h5>
                        <p class="m-0">Terdapat wisata alam yang menyejukkan mata seperti gunung, air terjun dan pemandangan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Transportasi</h5>
                        <p class="m-0">Menyediakan akomodasi transportasi yang akan mengantar selama perjalanan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Penginapan</h5>
                        <p class="m-0">Tidak perlu khawatir jika ingin bermalam karena terdapat banyak penginapan yang tersedia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimoni</h6>
                <h1>Para Pengguna BookWisata</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="{{ asset('frontend/img/testimonial-1.jpg') }}" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Fasilitas yang disediakan sangat memuaskan, tidak kecewa pesan disini
                        </p>
                        <h5 class="text-truncate">Agus</h5>
                        <span>Wisatawan</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="{{ asset('frontend/img/testimonial-2.jpg') }}" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Pilihan wisatanya bagus dan keren, jadi pingin liburan lagi
                        </p>
                        <h5 class="text-truncate">Anton</h5>
                        <span>Wisatawan</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="{{ asset('frontend/img/testimonial-3.jpg') }}" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Penginapannya yang ada di aplikasi ini murah-murah, sangat cocok bagi budget liburan saya haha
                        </p>
                        <h5 class="text-truncate">Ipeh</h5>
                        <span>Wisatawan</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="{{ asset('frontend/img/testimonial-4.jpg') }}" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Sangat membantu bagi saya dalam menentukan liburan dengan mudah dan gampang
                        </p>
                        <h5 class="text-truncate">Firman</h5>
                        <span>Wisatawan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Registration Start -->
    <div id='download' class="container-fluid bg-registration py-5" style="margin: 0px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-0 mb-lg-0">
                    <div class="mb-4">
                        <h1 class="text-white"><span class="text-primary">AYO !</span>Download Aplikasinya</h1>
                    </div>
                    <p class="text-white">Segera download aplikasi mobile untuk melanjutkan transaksi</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Memudahkan Transaksi</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Simpel dan Mudah</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Gratis</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">BookWisata</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form action="https://drive.google.com/drive/folders/1JL6PVtZV0UAXskg1wfnwJvjBw7PU7QmK?usp=sharing">
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit" >Download Apk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->




@endsection
