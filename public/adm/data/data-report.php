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
$produk = mysqli_query($con,"select * from t_artikel");
while($row = mysqli_fetch_array($produk)){
    $nama_produk[] = $row['judul'];

    $query = mysqli_query($con,"select sum(jumlah) as jumlah from t_report where id='".$row['id']."'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['jumlah'];
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        Berikut ini merupakan Data Laporan Pembelian Melalui WhatsApp!
                    </div>
                    <div class="table-responsive">
    <div style="width: 100%;height: 100%">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_produk); ?>,
                datasets: [{
                    label: 'Grafik Penjualan Bonsai Lampung',
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 205, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(201, 203, 207, 0.2)'
                    ],
                                    borderColor: [
                      'rgb(255, 99, 132)',
                      'rgb(255, 159, 64)',
                      'rgb(255, 205, 86)',
                      'rgb(75, 192, 192)',
                      'rgb(54, 162, 235)',
                      'rgb(153, 102, 255)',
                      'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
                        <table class="table table-bordered table-dark table-hover">
                            <br>
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>ID Bonsai</th>
                                    <th>Tanggal</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $sql = "select * from t_report where judul like '%".$cari."%'";
                            $hasil = mysqli_query($con, $sql);
                            } else {
                            $sql = "select * from t_report order by tanggal asc";
                            $hasil = mysqli_query($con, $sql);
                            }
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                            ?>
                            <tbody>
                                <tr>
                                    <td align="center"><?= $no; ?></td>
                                    <td align="center"><?= $data["id"]; ?></td>
                                    <td align="center"><?= $data["tanggal"];   ?></td>
                                    <td align="center"><?= $data["judul"];   ?></td>
                                    <td align="center"><?= $data["nama"];   ?></td>
                                    <td align="center"><?= $data["alamat"];   ?></td>
                                    <td align="center"><?= $data["notelp"];   ?></td>
                                    <td align="center"><?= $data["jumlah"];   ?></td>
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