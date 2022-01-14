<?php
require 'func.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title> </title> -->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js"
        integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous">
    </script>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/monokai-sublime.min.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="css/blog/css/theme-7.css">


</head>

<body>

    <header class="header text-center">
        <h1 class="blog-name pt-lg-4 mb-0"><a href="/">Bonsai Lampung</a></h1>

        <nav class="navbar navbar-expand-lg navbar-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navigation" class="collapse navbar-collapse flex-column">
                <div class="profile-section pt-3 pt-lg-0">
                    <!-- <div style="background-color:white; padding:10px; border-radius:5px"> -->
                        <img class="profile-image mb-3" src="css/blog/images/logo.png" alt="image">
                    <!-- </div><br> -->
                    <div class="bio mb-3">Bonsai Lampung Store. Merupakan Tempat Penjualan Bonsai dengan berbagai macam jenis Bonsai.</div>
                    <!--//bio-->
                    <ul class="social-list list-inline py-3 mx-auto">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
                    </ul>
                    <!--//social-list-->
                    <hr>
                </div>
                <!--//profile-section-->

                <ul class="navbar-nav flex-column text-left">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-home fa-fw mr-2"></i>Beranda <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog
                            Post</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="main-wrapper">

        <article class="blog-post px-3 py-5 p-md-5">
            <div class="container">

                <?php
						$id = $_GET["id"] ;
						$sql = "select * from t_artikel WHERE id = '$id'";
						$res = mysqli_query($con, $sql);
						while ($data = mysqli_fetch_array($res)) {
					?>
                <title><?php echo $data["judul"]; ?></title>

                <header class="blog-post-header">
                    <h2 class="title mb-2"><?= $data["judul"] ?></h2>
                    <div class="meta mb-3"><span class="date">Published by Bonsai Lampung Store </span><span
                            class="time">5 min
                            read</span></div>
                </header>

                <div class="blog-post-body">
                    <figure class="blog-banner text-center">
                        <img class="img-fluid" width="70%" src="/adm/data/img/<?php echo $data['gambar'];?>" />
                        <figcaption class="mt-2 text-center image-caption"> <?= $data["judul"] ?> </figcaption>
                    </figure>
                    <p class="text-justify"><?= $data["isi"] ?></p>
                    <div align="center">
                        <nav class="blog-nav nav nav-justified my-5" style="width:40%;">
                            <a class="nav-link-prev nav-item nav-link rounded" href="https://wa.me/6289682787161?text= Saya Mau Beli  <?php echo $data["judul"]; ?>" style="background-color:#5fcb71;">Beli Melalui Whatsapp</a>
                        </nav>
                    </div>
                </div>
                <?php
					}
					?>
                <nav class="blog-nav nav nav-justified my-5">
                    <a class="nav-link-prev nav-item nav-link rounded-left" href="/">Previous<i
                            class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                    <a class="nav-link-next nav-item nav-link rounded-right" href="blog-list.html">Next<i
                            class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                </nav>

            </div>
            <!--//container-->
        </article>

        <footer class="footer text-center py-2 theme-bg-dark">

            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by Tim
                Rocket</small>

        </footer>

    </div>
    <!--//main-wrapper-->


    <!-- *****CONFIGURE STYLE (REMOVE ON YOUR PRODUCTION SITE)****** -->
    <div id="config-panel" class="config-panel d-none d-lg-block">
        <div class="panel-inner">
            <a id="config-trigger" class="config-trigger config-panel-hide text-center" href="#"><i
                    class="fas fa-cog fa-spin mx-auto" data-fa-transform="down-6"></i></a>
            <h5 class="panel-title">Choose Colour</h5>
            <ul id="color-options" class="list-inline mb-0">
                <li class="theme-1 active list-inline-item"><a data-style="css/blog/css/theme-1.css" href="#"></a></li>
                <li class="theme-2  list-inline-item"><a data-style="css/blog/css/theme-2.css" href="#"></a></li>
                <li class="theme-3  list-inline-item"><a data-style="css/blog/css/theme-3.css" href="#"></a></li>
                <li class="theme-4  list-inline-item"><a data-style="css/blog/css/theme-4.css" href="#"></a></li>
                <li class="theme-5  list-inline-item"><a data-style="css/blog/css/theme-5.css" href="#"></a></li>
                <li class="theme-6  list-inline-item"><a data-style="css/blog/css/theme-6.css" href="#"></a></li>
                <li class="theme-7  list-inline-item"><a data-style="css/blog/css/theme-7.css" href="#"></a></li>
                <li class="theme-8  list-inline-item"><a data-style="css/blog/css/theme-8.css" href="#"></a></li>
            </ul>
            <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
        </div>
        <!--//panel-inner-->
    </div>
    <!--//configure-panel-->



    <!-- Javascript -->
    <script src="css/blog/plugins/jquery-3.3.1.min.js"></script>
    <script src="css/blog/plugins/popper.min.js"></script>
    <script src="css/blog/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="//cdnjsoudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>

    <!-- Custom JS -->
    <script src="css/blog/js/blog.js"></script>

    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="css/blog/js/demo/style-switcher.js"></script>


</body>

</html>
