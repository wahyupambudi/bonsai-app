<?php
include "../../func.php";
session_start();
if(!isset($_SESSION["login"])) {
header("Location: /adm/login.php");
exit;
}
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
// echo "<b>Hasil pencarian : ".$cari."</b>";
}
if(isset($_GET['delete'])) {
$id = $_GET['delete'];
$query = mysqli_query($con, "DELETE FROM t_user WHERE id='$id'");
// header("Location: index.php");
}

if(isset($_GET['on'])){
$id = $_GET['on'];
$query = mysqli_query($con, "UPDATE t_user SET status='on' WHERE id='$id'");
// header("Location: index.php");
}

if(isset($_GET['off'])){
$id = $_GET['off'];
$query = mysqli_query($con, "UPDATE t_user SET status='off' WHERE id='$id'");
// header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Dashboard Admin Bonsai</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <script>
            function cetak() {
                return window.print();
            }
        </script>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.png);"></a>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="data.php">Data Bonsai</a>
                        </li>
                        <li>
                            <a href="data-user.php">Data User</a>
                        </li>
                        <li>
                            <a href="data-report.php">Data Report</a>
                        </li>
                        <li>
                            <a href="create.php">Add Data Bonsai</a>
                        </li>
                        <li>
                        </ul>
                        <div class="footer">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bonsai Lampung Store! <i class="icon-heart" aria-hidden="true"></i> by <a href="#"target="_blank">bonsailampung</a></p>
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
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="../index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="data.php">Data Bonsai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="data-user.php">Data User</a>
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
                    <input type="button" onclick="cetak()" class="btn btn-info" value="Cetak Data" />
                    <!-- <a href="" target="_blank" class="btn btn-danger" role="button" onclick="cetak()">Cetak Data</a> -->
                    <div style="float: right;">
                        <form action="" method="get">
                            <input class="btn btn-outline-dark" style="height: 40px; cursor: none;" type="text" name="cari"
                            placeholder="Cari Data User">
                            <input class="btn btn-outline-success " type="submit" value="Cari">
                        </form>
                    </div><br><br>
                    <div class="alert alert-primary" role="alert">
                        Klik Ceklis untuk Mengaktifkan akun, dan klik off untuk menonaktifkan akun!
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-dark table-hover">
                            <br>
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Status Akun</th>
                                    <th colspan='2'>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $sql = "select * from t_user where email like '%".$cari."%'";
                            $hasil = mysqli_query($con, $sql);
                            } else {
                            $sql = "select * from t_user order by id asc";
                            $hasil = mysqli_query($con, $sql);
                            }
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                            ?>
                            <tbody>
                                <tr>
                                    <td align="center"><?= $no; ?></td>
                                    <td align="center"><?= $data["email"]; ?></td>
                                    <td align="center"><?= $data["username"];   ?></td>
                                    <td align="center" class="text-uppercase"><?= $data["status"];   ?></td>
                                    <td align="center">
                                        <a href="?on=<?= htmlspecialchars($data['id']); ?>" class="btn btn-success"
                                        role="button"><i class="fa fa-check-square" aria-hidden="true"></i></a>
                                        <a href="?off=<?= htmlspecialchars($data['id']); ?>" class="btn btn-warning"
                                        role="button"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                                        <a href="?delete=<?= $data['id'] ?>" class="btn btn-danger"
                                            onclick="return confirm('Yakin Ingin Menghapus Data?')"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/jquery.min.js"></script>
                <script src="js/popper.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/main.js"></script>
            </body>
        </html>