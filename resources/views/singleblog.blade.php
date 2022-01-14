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
<section id="blog">
    <br><br><br>
    <div class="container">
        <div class="section-header">
            <h2>Artikel Bonsai</h2>
        </div>
        <!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                <?php
					$sql = "select * from t_artikel order by id ASC";
					$res = mysqli_query($con, $sql);
					while ($data = mysqli_fetch_array($res)) {
						$valueMin = substr($data["isi"],0,200).'...'. '<a style="font-size:15px; color:#4ec95c" href=detail?id='.$data["id"].'> Baca Selengkapnya</a>';
				?>
                <div class="col-sm-4">
                    <div class="single-blog">
                        <div class="single-blog-img">
                            <img src="/adm/data/img/<?= $data['gambar'];?>" alt="blog image" style="width: 400px; height: 300px;">
                            <div class="single-blog-img-overlay"></div>
                        </div>
                        <div class="single-blog-txt">
                            <h2><a href="#"><?= $data['judul'] ?></a></h2>
                            <h3>Published by Bonsai Lampung Store </h3>
                            <p><?= $valueMin ?></p>
                        </div>
                    </div>
                </div>
                <?php
			};
		?>
                
            </div>
        </div>
        <br><br>
    </div>
    <!--/.container-->

</section>
@include('footer1')
