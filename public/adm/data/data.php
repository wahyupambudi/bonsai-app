<?php
session_start();
if(!isset($_SESSION["login"])) {
header("Location: login.php");
exit;
}
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
// echo "<b>Hasil pencarian : ".$cari."</b>";
}
include "../../func.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <title>Form Input Mahasiswa</title>
        <style>
        body {
        background-color: #212529;
        }
        </style>
    </head>
    <body>
        <?php include("header.php") ?>
        <div class="container">
            <br>
            <h4>Input Data</h4>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
            <a href="/adm/" class="btn btn-warning" role="button">Kembali</a>
            <div style="float: right;">
                <form action="data.php" method="get">
                    <label>Cari :</label>
                    <input class="btn btn-outline-light" style="height: 40px; cursor: none;" type="text" name="cari" placeholder="Cari Data Bonsai">
                    <input class="btn btn-outline-success " type="submit" value="Cari">
                </form>
            </div><br><br>
            
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover">
                    <br>
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Jenis Bonsai</th>
                            <th>Deskripsi</th>
                            <th>Gambar Bonsai</th>
                            <th colspan='2'>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    if(isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $sql = "select * from t_artikel where judul like '%".$cari."%'";
                    $hasil = mysqli_query($con, $sql);
                    } else {
                    $sql = "select * from t_artikel order by id asc";
                    $hasil = mysqli_query($con, $sql);
                    }
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                    <tbody>
                        <tr>
                            <td align="center"><?= $no; ?></td>
                            <td><?= $data["judul"]; ?></td>
                            <td style="width: 40%; font-size: 12px"><?= $data["isi"];   ?></td>
                            <td align="center"><img src="img/<?= $data["gambar"];?>" width="200px" alt=""> </td>
                            <td align="center">
                                <a href="update.php?id=<?= htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <?php
                                    if (isset($_GET['id'])) {
                                        $id = htmlspecialchars($_GET["id"]);
                                        $sql = "delete from t_artikel where id='$id' ";
                                        $hasil = mysqli_query($con, $sql);
                                        if ($hasil) {
                                        header("Location:data.php");
                                        } else {
                                        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                                        }
                                    }
                                ?>

                                <a href="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?= $data['id']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
    </body>
</html>