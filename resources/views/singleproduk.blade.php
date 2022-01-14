<?php
	require 'func.php'
?>
@include('nav')
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
<section id="new-arrivals" class="new-arrivals">
    <div class="container">
        <div class="section-header">
            <h2>Produk Bonsai Kami</h2>
        </div>
        <!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row">
                <?php
						$sql = "select * from t_artikel order by id asc";
						$res = mysqli_query($con, $sql);
						while ($data = mysqli_fetch_array($res)) {
							$valueMin = substr($data["isi"],0,200).'...'. '<a href=detail?id='.$data["id"].'> Baca Selengkapnya</a>';
					?>
                <div class="col-md-3 col-sm-4">
                    <div class="single-new-arrival">
                        <div class="single-new-arrival-bg">
                            <img style="max-height:280px" src="/adm/data/img/<?php echo $data['gambar'];?>" alt="Bonsai Images">
                            <div class="single-new-arrival-bg-overlay"></div>
                            <div class="sale bg-2">
                                <p>sale</p>
                            </div>
                            <div class="new-arrival-cart">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <a href="../detail?id=<?= $data['id']; ?>">Detail Produk
                                        <?= $data["judul"]; ?></a>
                                </p>
                            </div>
                        </div>
                        <h4><a href="#"><?= $data["judul"]; ?></a></h4>
                        <!-- <p class="arrival-product-price">Rp. 900.000,00</p> -->
                        <a class="btn-wa welcome-add-cart" style="border-radius: 5px;" target="_blank" 
                            href="/user/report.php?id=<?= $data['id']; ?>">
                            <span class="fa fa-whatsapp"></span>
                            Beli Di WhatsApp
                        </a>
                    </div>
                </div>
                <?php
						};
					?>
            </div>
        </div>
    </div>
    <!--/.container-->
</section>
@include('footer1')
