<?php
// include "../func.php";
$produk = mysqli_query($con,"select * from t_artikel");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['judul'];

	$query = mysqli_query($con,"select sum(id) as jumlah from t_report where id='".$row['id']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
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
