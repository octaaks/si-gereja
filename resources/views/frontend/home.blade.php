<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GKE Haleluya Nanga Bulik</title>
    <link rel="stylesheet" href="/css-home/style-main.css">
    <link rel="stylesheet" href="/css-home/style-header.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css-home/style-nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <link rel="icon" type="image/jpg" href="/favicon.jpg" />
</head>

<body>
    <header>
        <div class="header-background">
            <div class="container">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="#"><img class="nav-logo" src="/img/logo1.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <!-- ml-auto untuk membuat navnya nempel ke kanan -->
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link" href="/warta">Warta Jemaat</a>
                                <a class="nav-item nav-link" href="/liturgi">Liturgi</a>
                                <a class="nav-item nav-link" href="/renungan">Renungan</a>
                                <a class="nav-item nav-link" href="/video">Video</a>
                                <a href="#kontak" button class="btn btn-primary">Kontak</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Akhir Navbar -->
                <div class="hero flex items-center justify-between row">
                    <div class="filler-collumn col-md-6 left flex-1 flex justify-center">
                        <div class="filler">
                        </div>
                    </div>
                    <div class="col-md-6 right flex-1 flex justify-center">
                        <div class="top-title">
                            <h1 style="text-shadow: 0px 0px 15px #5555ff;">Amsal <span> 19:21 </span>
                            </h1>
                            <p style="text-shadow: 1px 1px 2px #010101;">Banyaklah rancangan di hati
                                manusia, tetapi keputusan TUHANlah yang terlaksana.</p>
                            <div class="stream-btn">
                                <!-- <button class=" btn btn-secondary">LIVE STREAMING</button> -->
                                <form action="https://www.youtube.com/channel/UC3Rd92grtJT-X5JZBP1rWPA">
                                    <button class="btn btn-primary">LIVE STREAMING</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- jadwal ibadah -->
    <section id="service" class="service">

        <div class="container">
            <h1 class="section-heading"><span> Jadwal </span> Ibadah </h1>
            <p> GKE Haleluya Nanga Bulik </p>

            <!-- HUBUNGI KAMI   -->
            <div class="py-5 service-11">
                <div class="container">
                    <!-- Row  -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-church.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Ibadah Minggu</h6>
                                    <p class="mt-3">Pukul 10:00 WIB & 17:00 WIB</p>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-kids.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Ibadah Sekolah Minggu</h6>
                                    <p class="mt-3">
                                        Pukul 08:00 WIB
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-youth.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Ibadah Pemuda</h6>
                                    <p class="mt-3">Kamis | Pukul 16:00 WIB.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vidio -->
    <section class="work">
        <div class="container">
            <h1 class="section-heading"> <span>Video </span>Ibadah</h1>
            <p>GKE Haleluya Nanga Bulik</p>

            <div class="row">
                @foreach($video as $item)
                @if( $loop->first or $loop->iteration <= 3 ) <div class="col-lg-4 d-flex justify-content-center mt-1">
                    <iframe class="home-video" src="https://www.youtube.com/embed/{{$item->url}}"
                        title="{{$item->title}}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
            @endif
            @endforeach
        </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="contact">
        <div class="container">

            <h1 class="section-heading"> <span>Hubungi </span>Kami</h1>
            <!-- <h6 class="section-heading mt-4"> Anda dapat menghubungi kami melalui:</h6> -->
            <p>Anda dapat menghubungi kami melalui</p>

            <!-- HUBUNGI KAMI   -->
            <div class="py-5 service-11">
                <div class="container">
                    <!-- Row  -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-telp.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Telepon</h6>
                                    <p class="mt-3">(0532) 2071325</p>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-email.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Email</h6>
                                    <p class="mt-3">gkehaleluya@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-4 wrap-service11-box">
                            <div class="card card-shadow border-0 mb-4">
                                <div class="p-4">
                                    <div class="icon-space">
                                        <div
                                            class="icon-round text-center d-inline-block rounded-circle bg-success-gradiant">
                                            <img class="img-service" src="./image/icon-loc.png" alt="">
                                        </div>
                                    </div>
                                    <h6 class="font-weight-medium">Kunjungi Kami</h6>
                                    <p class="mt-3">Jl. Jend. A. Yani No. 137 RT. 10 A Nanga Bulik Kab. Lamandau</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success" id="email" role="alert">
                {{session('success')}}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger" id="email" role="alert">
                {{session('error')}}
            </div>
            @endif
            <form action="{{ route('send.email') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-wrap-2">
                    <input type="text" name="name" placeholder="Name *" required="required">
                </div>
                <div class="input-wrap-2">
                    <input type="email" name="email" placeholder=" Email *" required="required">
                </div>
                <div class="input-wrap-2">
                    <input type="text" name="no_hp" placeholder=" No HP *" required="required">
                </div>
                <div class="input-wrap-2">
                    <input type="text" name="subject" placeholder="Subjek..." required="required">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Tulis Pesan...."
                        required="required"></textarea>
                </div>
                <div class="btn-wrapper mt-3">
                    <input type="submit" class="btn btn-primary" value="KIRIM EMAIL"></input>
                    <!-- <button type="submit" class="btn btn-primary tombol nav-item">KIRIM EMAIL</button> -->
                </div>
            </form>
        </div>
    </section>

    <!-- footer -->

    <div class="footer-home">
        <!-- <div class="row"> -->
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="90%" height="300px" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=GKE%20haleluya%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                <a href="https://www.whatismyip-address.com/divi-discount/"></a>
                <br>
                <style>
                .mapouter {
                    position: relative;
                    text-align: center;
                }
                </style><a href="https://www.embedgooglemap.net">responsive google maps</a>
                <style>
                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 300px;
                }
                </style>
            </div>
        </div>
        <!-- </div> -->

        <div class="footer-socials mt-5">
            <a href="https://www.facebook.com/jemaatgke.nangabulik/" class="fa fa-facebook"></a>
            <a href="https://www.youtube.com/channel/UC3Rd92grtJT-X5JZBP1rWPA" class="fa fa-youtube"></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

<div style="background:#ffffff; padding:20px; text-align:center;">

    <img style="height:40px; margin-right:20px" src="/img/logo.png" alt="">Copyright 2021 "©" Joeee. All Right
    Reserved.
</div>

</html>