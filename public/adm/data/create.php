<?php
session_start();
if(!isset($_SESSION["login"])) {
header("Location: login.php");
exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Form Create Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="/adm/">Home</a>
            </li>
            <li>
              <a href="/adm/data/data.php">Data Bonsai</a>
            </li>
            <li>
              <a href="/adm/data/data.php">Data User</a>
            </li>
            <li>
              <a href="/adm/data/data-report.php">Data Report</a>
            </li>
            <li>
              <a href="create.php">Add Data Bonsai</a>
            </li>
          </ul>
          <div class="footer">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bonsai Lampung Store! <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">bonsailampung</a></p>
          </div>
        </div>
      </nav>
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
                  <a class="nav-link" href="/adm/data/data.php">Data Bonsai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/adm/data/data.php">Data User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="data-report.php">Data Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="create.php">Add Data Bonsai</a>
                </li>
                <li class="nav-item">
                  <a class=" btn btn-danger text-light" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <h2 class="mb-4">Input Data Bonsai</h2>
        <p>Masukkan Data Ke dalam Form, pastikan tidak ada data yang salah ataupun duplikat.</p>
        <div class="container-fluid">
          <div class="container">
            <?php
            //Include file koneksi, untuk koneksikan ke database
            include "../../func.php";
            //Fungsi untuk mencegah inputan karakter yang tidak sesuai
            function input($data)
            {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
            if (isset($_POST["add_post"])) {
            
            $judul = input($_POST["judul"]);
            $gambar = @$_FILES['gambar']['name'];
            $tmp = @$_FILES['gambar']['tmp_name'];
            $gambarbaru = date ('dmYis').$gambar;
            $path = "img/".$gambarbaru;
            $isi = input($_POST["isi"]);
            if(move_uploaded_file($tmp, $path)) {
            $sql = "insert into t_artikel (judul,gambar,isi) values ('$judul','$gambarbaru','$isi')";
            $hasil = mysqli_query($con, $sql);
            if ($hasil ) {
            // echo '<script type="text/javascript">';
            //     echo 'Swal.fire("Good job!","You clicked the button!","success")';
            // echo '</script>';
            echo "<script>Swal.fire('Good job!')</script>";
            // header("Location:../index.php");
            } else{
            echo "Pesan Error ". mysqli_error($con);
            }
            }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="judul" class="form-control" placeholder="Input Jenis Bonsai" required />
              </div>
              <div class="form-group">
                <label>Gambar:</label>
                <input type="file" name="gambar" class="form-control" placeholder="Input Gambar" required />
              </div>
              <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="isi" class="form-control" rows="5" placeholder="Input Deskripsi" required></textarea>
              </div>
              <br>
              <button type="submit" name="add_post" class="btn btn-primary">Submit</button>
              <a href="index.php" class="btn btn-danger">Kembali</a>
            </form>
          </div><br><br>
        </div>
        
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
      </body>
    </html>