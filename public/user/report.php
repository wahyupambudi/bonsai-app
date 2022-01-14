<?php
include "../func.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <!-- title of site -->
    <title>Bonsai Lampung Store</title>
    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="../../assets/logo/favicon.ico" />
    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <!--linear icon css-->
    <link rel="stylesheet" href="../../assets/css/linearicons.css">
    <!--animate.css-->
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <!--owl.carousel.css-->
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- bootsnav -->
    <link rel="stylesheet" href="../../assets/css/bootsnav.css">
    <!--style.css-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!--responsive.css-->
    <link rel="stylesheet" href="../../assets/css/responsive.css">

</head>

<body>
    <header id="home" class="welcome-hero">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <!-- .item -->
                <div class="item active">
                    <div class="single-slide-item slide1">
                        <div class="container">
                            <div class="welcome-hero-content">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="single-welcome-hero">
                                            <?php
                                                    $id = $_GET["id"] ;
                                                    $sql = "select * from t_artikel WHERE id = '$id'";
                                                    $res = mysqli_query($con, $sql);
                                                    while ($data = mysqli_fetch_array($res)) {
                                                    ?>
                                            <div class="welcome-hero-txt">
                                                <h2><?= $data['judul']; ?></h2>
                                                <p>
                                                    <?= $data['isi']; ?>
                                                </p>
                                            </div>
                                            <div class="welcome-hero-img" align="center">
                                                <img style="max-width: 400px; max-height: 300px; border-radius: 10px"
                                                    src="/adm/data/img/<?php echo $data['gambar'];?>"
                                                    alt="slider image">
                                            </div>
                                            <!--/.welcome-hero-txt-->
                                        </div>
                                        <!--/.single-welcome-hero-->
                                    </div>
                                    <!--/.col-->
                                    <div class="col-sm-5">
                                        <div class="single-welcome-hero">
                                            <div class="alert alert-danger" role="alert">
                                                Satu Tahap sebelum membeli Produk Kami, Yuk Isi dulu :).
                                            </div>

                                        <?php
                                            //Fungsi untuk mencegah inputan karakter yang tidak sesuai
                                            function input($data)
                                            {
                                                $data = trim($data);
                                                $data = stripslashes($data);
                                                $data = htmlspecialchars($data);
                                                return $data;
                                            }
                                            //Cek apakah ada kiriman form dari method post
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                                $id = input($_POST["id"]);
                                                $judul = input($_POST["judul"]);
                                                $nama = input($_POST["nama"]);
                                                $alamat = input($_POST["alamat"]);
                                                $notelp = input($_POST["notelp"]);
                                                $tanggal = input($_POST["tanggal"]);
                                                $jumlah = input($_POST["jumlah"]);

                                                //Query input menginput data kedalam tabel anggota
                                                $sql = "insert into t_report (id, judul, nama, alamat, notelp, tanggal, jumlah ) values ('$id','$judul','$nama','$alamat','$notelp','$tanggal', '$jumlah')";

                                                //Mengeksekusi/menjalankan query diatas
                                                $hasil = mysqli_query($con, $sql);

                                                //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                                                if ($hasil ) {
                                                    echo('<script> location.href = "https://wa.me/6289682787161?text=Halo Admin, Saya ingin informasi mengenai '.$data["judul"].'";</script>');
                                                    // header('Location: https://wa.me/6289682787161?text= Saya ingin informasi mengenai '.$data["judul"]);
                                                } else{
                                                    echo "Pesan Error ". mysqli_error($con);
                                                    echo "<div class='alert alert-danger'> sudah terdaftar, Data Gagal disimpan.</div>";
                                                    echo "<div class='alert alert-warning'> Tidak Boleh Terdapat ID Mahasiswa yang Sama.</div>";
                                                }
                                            }
                                            ?>


                                            <form action="" method="post" style="width: 100%">
                                                <input type="text" name="id" id="" value="<?= $data['id'] ?>" hidden>
                                              <div class="form-group">
                                                <input type="text" name="judul" class="form-control" required value="<?= $data['judul'] ?>"/>
                                              </div>
                                              <div class="form-group">
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required />
                                              </div>
                                              <div class="form-group">
                                                <input type="number" name="notelp" class="form-control" placeholder="Masukkan No telp" required />
                                              </div>
                                              <div class="form-group">
                                                <input type="date" name="tanggal" class="form-control" required />
                                              </div>
                                              <div class="form-group">
                                                <input type="number" name="jumlah" class="form-control" required />
                                              </div>
                                              <div class="form-group">
                                                <textarea name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required></textarea>
                                              </div>
                                              <button type="submit" name="add_post" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <!--/.single-welcome-hero-->
                                    </div>
                                    <?php } ?>
                                    <!--/.col-->
                                </div>
                                <!--/.row-->
                            </div>
                            <!--/.welcome-hero-content-->
                        </div><!-- /.container-->
                    </div><!-- /.single-slide-item-->
                </div><!-- /.item .active-->
            </div><!-- /.carousel-inner-->
        </div>
        <div></div>
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"
                    data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->
                    <div class="container">
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">
                            <ul>
                                <li class="search">
                                    <img src="../css/blog/images/logo.png" width="80px" height="80px" alt=""
                                        style="padding:10px;">
                                </li>
                            </ul>
                        </div>
                        <!--/.attr-nav-->
                        <!-- End Atribute Navigation -->
                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <!-- <img class="navbar-brand" src="css/blog/images/profile.png" alt=""> -->
                            <a class="navbar-brand" href="/">Bonsai Lampung</a>
                        </div>
                        <!--/.navbar-header-->
                        <!-- End Header Navigation -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=" scroll active"><a href="#home">Home</a></li>
                                <li><a href="/produk">Produk Kami</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/kontak">Kontak Kami</a></li>
                                <li><a href="/about">Tentang Kami</a></li>
                            </ul>
                            <!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div>
                    <!--/.container-->
                </nav>
                <!--/nav-->
                <!-- End Navigation -->
            </div>
            <!--/.header-area-->
            <div class="clearfix"></div>
        </div><!-- /.top-area-->
    </header>

        <!-- Include all js compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="../assets/js/bootsnav.js"></script>
    <!--owl.carousel.js-->
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


    <!--Custom JS-->
    <script src="../assets/js/custom.js"></script>

</body>

</html>
