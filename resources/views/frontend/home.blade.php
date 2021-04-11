<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gereja</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/style-home.css">

</head>


<body>
    <header>
        <div style="background-image: url('worship.jpg'); background-size: cover">
            <div class="container">
                <nav id="main-nav" class="flex items-center justify-between">
                    <div class="left flex items-center">
                        <div class="branding">
                            <img style="height:70px" src="./img/logo1.png" alt="">
                        </div>
                        <div class="left">
                            <a href="/warta">Warta Jemaat</a>
                            <a href="/liturgi">Liturgi</a>
                            <a href="/renungan">Renungan</a>
                            <a href="/video">Video</a>
                        </div>
                    </div>
                    <div class="right">
                        <a href="#kontak" button class="btn btn-primary">Kontak</a>
                        <!-- <form action="#kontak">
                                <button class="btn btn-primary"> Kontak </button>
                        </form> -->
                    </div>
                </nav>
                <div class="hero flex items-center justify-between">
                    <div class="left flex-1 flex justify-center">
                        <div style="height:800px">
                            <!-- <img src="./image/man.png" alt=""> -->
                        </div>
                    </div>
                    <div class="right flex-1">
                        <!-- <h6>Joe Ackerman</h6> -->
                        <h1>Amsal <span> 19:21 </span> </h1>
                        <p>Banyaklah rancangan di hati manusia, tetapi keputusan TUHANlah yang terlaksana.</p>
                        <div>
                            <!-- <button class="btn btn-secondary">LIVE STREAMING</button> -->
                            <form action="https://www.youtube.com/channel/UC3Rd92grtJT-X5JZBP1rWPA">
                                <button class="btn btn-secondary">LIVE STREAMING</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- about -->
    <!-- <section class="about">
            <div class="container flex items-center">
                <div class="flex-1">
                    <img class="about-me-img" src="./image/man-2.png" alt="">
                </div>
                <div class="flex-1">
                    <h1> About <span> Me </span></h1>
                    <h3> GKE Haleluya </h3>
                    <p> Gereja adalah suatu kata bahasa Indonesia yang berarti suatu perkumpulan atau lembaga dari penganut iman Kristiani. Istilah Yunani ἐκκλησία, yang muncul dalam Perjanjian Baru di Alkitab Kristen biasanya diterjemahkan sebagai "jemaat/umat". </p>
                    <div class="social">
                        <a href="#"><img src="./image/website.svg" alt=""></a>
                        <a href="#"><img src="./image/facebook.svg" alt=""></a>
                        <a href="#"><img src="./image/twitter.svg" alt=""></a>
                        <a href="#"><img src="./image/pintrest.svg" alt=""></a>
                        <a href="#"><img src="./image/instagram.svg" alt=""></a>
                    </div>
    
                </div>
            </div>
        </section> -->


    <!-- jadwal ibadah -->
    <section id="service" class="service">
        <div class="container">
            <h1 class="section-heading"><span> Jadwal </span> Ibadah </h1>
            <p> GKE Haleluya Nanga Bulik </p>
            <div class="card-wrapper">
                <div class="card">
                    <img class="img-service" src="./image/icon-church.png" alt="">
                    <h2> Ibadah Minggu </h2>
                    <p> Pukul 10:00 WIB.</p>
                    <p> Pukul 17:00 WIB.</p>
                </div>
                <div class="card">
                    <img class="img-service" src="./image/icon-kids.png" alt="">
                    <h2> Ibadah Sekolah Minggu </h2>
                    <p> Pukul 08:00 WIB.</p>

                </div>
                <div class="card">
                    <img class="img-service" src="./image/icon-youth.png" alt="">
                    <h2> Ibadah Pemuda </h2>
                    <p> Kamis | Pukul 16:00 WIB.</p>

                </div>
            </div>
        </div>
    </section>

    <!-- Vidio -->
    <section class="work">
        <div class="container">
            <h1 class="section-heading"> <span>Video </span>Ibadah</h1>
            <p>GKE Haleluya Nanga Bulik</p>

            <div class="flex items-center justify-between">
                @foreach($video as $item)
                @if( $loop->first or $loop->iteration <= 3 ) <iframe width="320" height="180"
                    src="https://www.youtube.com/embed/{{$item->url}}" title="{{$item->title}}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

                    @endif
                    @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="contact">
        <div class="container">
            <h1 class="section-heading"> <span>Hubungi </span>Kami</h1>
            <p> sdhg alskjgh jskh jhds khsdjkhag ksdjhg s hsj dghjkas jkghsj </p>
            <div class="card-wrapper">
                <div class="card">
                    <img class="img-service" src="./image/icon-telp.png" alt="">
                    <h1> Call Us On</h1>
                    <h6> 0821-xxxx-xxxx</h6>
                </div>
                <div class="card">
                    <img class="img-service" src="./image/icon-email.png" alt="">
                    <h1> Email Us At</h1>
                    <h6> gkehaleluya@gmail.com</h6>
                </div>
                <div class="card">
                    <img class="img-service" src="./image/icon-loc.png" alt="">
                    <h1> Visit Office</h1>
                    <h6> Jl.GTM Yusuf Nanga Bulik, Kalimantan Tengah</h6>
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
                <div class="input-wrap">
                    <input type="text" name="name" placeholder="Name *">
                    <input type="email" name="email" placeholder=" Email *">
                </div>
                <div class="input-wrap-2">
                    <input type="text" name="subject" placeholder="Subject...">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Tulis Pesan...."></textarea>
                </div>
                <div class="btn-wrapper">
                    <input type="submit" class="btn btn-primary" value="KIRIM EMAIL"></input>
                </div>
            </form>
        </div>
    </section>

    <!-- footer -->

    <footer>
        <img style="height:70px" class="footer-logo" src="./img/logo.png" alt="">
        <div class="footer-socials">
            <a href="#"><img src="./image/website.svg" alt=""></a>
            <a href="#"><img src="./image/facebook.svg" alt=""></a>
            <a href="#"><img src="./image/twitter.svg" alt=""></a>
            <a href="#"><img src="./image/pintrest.svg" alt=""></a>
            <a href="#"><img src="./image/instagram.svg" alt=""></a>
        </div>
        <div class="copyright">
            Copyright 2021 "©" Bang Jago. All Right Reserved.
        </div>
    </footer>
    </div>
</body>

</html>