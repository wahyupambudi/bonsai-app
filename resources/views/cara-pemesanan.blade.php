@include('skrip')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <!-- title of site -->
    <title>Bonsai Lampung Store</title>
    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.ico" />
    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--linear icon css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--owl.carousel.css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css">
    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
@include('nav')
    <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

    <div class="carousel-inner" role="listbox" style="margin-top:-5%">
                <!-- .item -->
                <div class="item active">
                    <div class="single-slide-item slide1">
                        <div class="container">
                            <div class="welcome-hero-content">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="single-welcome-hero">
                                            <div class="welcome-hero-txt">
                                                <h4>The most popular and also best seller bonsai</h4>
                                                <h2>Cara Pemesanan Bonsai Lampung Store</h2>
                                                <p>
                                                    Untuk Pemesanan Produk Bonsai kami melalui whatsapp, namun diperlukan untuk pengisian data terlebih dahulu ketika mengklik tombol beli di WhatsApp.
                                                    <br>
                                                    Kemudian setelah mengisi data, maka akan diarahkan langsung ke kontak penyedia produk bonsai, dan anda bisa melakukan transaksi melalui WhatsApp.
                                                </p>
                                                <button class="btn-cart welcome-add-cart"
                                                    onclick="window.location.href='https://wa.me/6289682787161?text= Halo Admin Bonsai Lampung Store, Saya ingin informasi Mengenai Produk Bonsai Lampung Store.'">
                                                    <span class="fa fa-whatsapp"></span>
                                                    Chat <span>di</span> Whatsapp
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.col-->
                                    <div class="col-sm-5">
                                        <div class="single-welcome-hero">
                                            <div class="welcome-hero-img">
                                                <img src="assets/images/slider/slider1.png" alt="slider image">
                                            </div>
                                            <!--/.welcome-hero-txt-->
                                        </div>
                                        <!--/.single-welcome-hero-->
                                    </div>
                                    <!--/.col-->
                                </div>
                                <!--/.row-->
                            </div>
                            <!--/.welcome-hero-content-->
                        </div><!-- /.container-->
                    </div><!-- /.single-slide-item-->
                </div><!-- /.item .active-->

@include('footer1')

</body>


