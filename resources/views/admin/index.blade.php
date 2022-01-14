<?php
session_start();
if(!isset($_SESSION["login"])) {
header("Location: login");
exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Hidup Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="data.php">Data Mahasiswa</a>
            </li>
            <li>
              <a href="create.php">Add Data Mahasiswa</a>
            </li>
            <li>
              <a href="https://awonapa.com" target="_blank">Blog</a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=6289682787161&text=Assalamualaikum%20Wr%20Wb" target="_blank">Contact</a>
            </li>
          </ul>
          <div class="footer">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Hidup Mahasiswa! <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">mahasiswa.com</a></p>
          </div>
        </div>
      </nav>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="data.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="create.php">Add Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                  <a class=" btn btn-danger text-light" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <h2 class="mb-4">Dashboard Admin</h2>
        <p>Halaman Dashboard admin, digunakan untuk anda melakukan Create Data, Read Data, Update Data, dan Delete Data Pada Database Mahasiswa, melalui Form yang sudah disediakan. </p>
        <?php include("slide.php") ?>
        
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>