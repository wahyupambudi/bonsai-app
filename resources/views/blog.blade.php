<?php
require 'func.php'
?>

<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2>Artikel Bonsai</h2>
        </div>
        <!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                <?php
					$sql = "select * from t_artikel order by RAND() LIMIT 3";
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
        <div align="center">
            <button style="width:50%" class="btn-cart welcome-add-cart" onclick="window.location.href='/blog'">
                <span class="lnr lnr-book"></span>
                Lihat Semua Artikel Bonsai
                <span class="lnr lnr-arrow-right-circle"></span>
            </button>
        </div>
        <br><br>
    </div>
    <!--/.container-->

</section>
