<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		$MASUA = $_GET['MASP'];
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');
		$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
			FROM sua
			WHERE Ma_sua = '$MASUA'";
		$result = mysqli_query($conn, $sql);
		$item = mysqli_fetch_row($result);
	 ?>
	 <div class="form">
	 	<div class="grid-container chungus">
	 		<div class="grid-item item1-3 text-center">
	 			<h1><?php echo $item[0]; ?></h1>
	 			<hr>
	 		</div>
	 		<div class="grid-item text-center">
	 			<img src=<?php echo "../images/Hinh_sua/$item[5]" ?>>
	 		</div>
	 		<div class="grid-item">
	 			<b>Thành phần dinh dưỡng: </b>
	 			<p><?php echo $item[1]; ?></p><br>
	 			<b>Lợi ích</b>
	 			<p><?php echo $item[2]; ?></p><br>
	 			<p align="right">
	 				<b>Trọng lượng: </b><?php echo $item[3] ?> grid - <b>Đơn giá: </b><?php echo number_format($item[4]) ?> VNĐ
	 			</p>
	 		</div>
	 		<div class="grid-item text-center">
	 			<a href="javascript:window.history.back(-1);">Quay lại trang trước.</a>
	 		</div>
	 	</div>
	 </div>
	 <p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		$MASUA = $_GET['MASP'];
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');
		$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
			FROM sua
			WHERE Ma_sua = '$MASUA'";
		$result = mysqli_query($conn, $sql);
		$item = mysqli_fetch_row($result);
	</textarea>
</body>
</html>