<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gereja</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

</head>


<body>
    <!-- mobile nav -->
    <!-- <div class="site-main-wrapper">
        <button class="hamberger">
            <img src="./image/hamberger.svg" alt="">
        </button>

        <div class="mobile-nav">
            <button class="times"><img src="./image/times.svg" alt=""></button>
            <ul>
                <li><a href="#">Warta Jemaat</a></li>
                <li><a href="#">Liturgi</a></li>
                <li><a href="#">Renungan</a></li>
                <li><a href="#">Video</a></li>
            </ul>
        </div> -->

    <!-- desktop nav -->
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
                        <!-- <a href="" button class="btn btn-primary">Kontak</a> -->
                        <form action="#kontak">
                                <button class="btn btn-primary"> Kontak </button>
                        </form>
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
                            <button class="btn btn-secondary">LIVE STREAMING</button>
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
                    <img src="./image/brush.svg" alt="">
                    <h2> Ibadah Minggu </h2>
                    <p> Pukul 10:00 WIB.</p>
                    <p> Pukul 17:00 WIB.</p>
                </div>
                <div class="card">
                    <img src="./image/code.svg" alt="">
                    <h2> Ibadah Sekolah Minggu </h2>
                    <p> Pukul 08:00 WIB.</p>

                </div>
                <div class="card">
                    <img src="./image/brush.svg" alt="">
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
            <p> GKE Haleluya Nanga Bulik</p>

            <div class="flex items-center justify-between">
                <iframe width="512" height="360" src="https://www.youtube.com/embed/z6CSW2yu8Mg"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <iframe width="512" height="360" src="https://www.youtube.com/embed/z6CSW2yu8Mg"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
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
                    <img src="./image/phone-2.svg" alt="">
                    <h1> Call Us On</h1>
                    <h6> 0821-xxxx-xxxx</h6>
                </div>
                <div class="card">
                    <img src="./image/phone-2.svg" alt="">
                    <h1> Email Us At</h1>
                    <h6> gkehaleluya@gmail.com</h6>
                </div>
                <div class="card">
                    <img src="./image/map.svg" alt="">
                    <h1> Visit Office</h1>
                    <h6> Jl.GTM Yusuf Nanga Bulik, Kalimantan Tengah</h6>
                </div>
            </div>

            <form action="">
                <div class="input-wrap">
                    <input type="text" placeholder="Your Name *">
                    <input type="email" placeholder="Your Email *">
                </div>
                <div class="input-wrap-2">
                    <input type="text" placeholder="Your subject...">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Your Message..."></textarea>
                </div>
                <div class="btn-wrapper">
                    <button class="btn btn-primary"> SEND MESSAGE </button>
                </div>
            </form>
        </div>
    </section>

    <!-- footer -->

    <footer>
        <img class="footer-logo" src="./image/GKE.jpg" alt="">
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
