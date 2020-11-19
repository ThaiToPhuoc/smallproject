<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');
		if (isset($_POST['submit'])) {
			if (!empty($_POST['name']) && isset($_POST['name'])){
				$name = $_POST['name'];
				$provider = $_POST['provider'];
				$type = $_POST['type'];
			}
		}
		else{
			$name = "";
			$provider = "";
			$type = "";
		}
	?>

	<form class="container" action="" method="POST">
		<div class="row justify-content-center">
			<div class="col-lg-12 text-center">
				<h2>TÌM KIẾM THÔNG TIN SỮA</h2>
			</div>
			<div class="col-lg-12 text-center">
				Loại sữa: 
				<select name="type">
					<?php 
						$sql_t = "SELECT * FROM loai_sua";
						$types = mysqli_query($conn, $sql_t);
						$count_t = mysqli_num_rows($types);
						$i = false;
						while ($item = mysqli_fetch_array($types)) {
							if($type == $item[Ma_loai_sua]){
								echo "<option value='$item[Ma_loai_sua]' selected>$item[Ten_loai]</option>";
							}
							elseif(!$i){
								echo "<option value='$item[Ma_loai_sua]' selected>$item[Ten_loai]</option>";
								$i = true;
							}
							else{
								echo "<option value='$item[Ma_loai_sua]'>$item[Ten_loai]</option>";
							}
						}
					 ?>
				</select>
				&nbsp;
				&nbsp;
				&nbsp;
				Hãng sữa: 
				<select name="provider">
					<?php 
						$sql_t = "SELECT * FROM hang_sua";
						$providers = mysqli_query($conn, $sql_t);
						$count_t = mysqli_num_rows($providers);
						$i = false;
						while ($item = mysqli_fetch_array($providers)) {
							if($provider == $item[Ma_hang_sua]){
								echo "<option value='$item[Ma_hang_sua]' selected>$item[Ten_hang_sua]</option>";
							}
							elseif(!$i){
								echo "<option value='$item[Ma_hang_sua]' selected>$item[Ten_hang_sua]</option>";
								$i = true;
							}
							else{
								echo "<option value='$item[Ma_hang_sua]'>$item[Ten_hang_sua]</option>";
							}
						}
					 ?>
				</select>
			</div>
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12 text-center">
				Tên sữa: <input type="text" name="name" value="<?php echo($name) ?>">
				<input type="submit" value="tìm kiếm" name="submit">
			</div>
			<?php 
				if (isset($_POST['submit'])) {
					if (!empty($_POST['name']) && isset($_POST['name'])) {

						$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
						FROM sua
						WHERE LOWER(sua.Ten_sua) like LOWER('%$name%') AND sua.Ma_loai_sua = '$type' AND sua.Ma_hang_sua = '$provider'";

						$result = mysqli_query($conn, $sql);

						echo "<div class='col-lg-12 row'>";
						if (mysqli_num_rows($result) > 0) {
							echo "<div class='col-lg-12 text-center'><b>Có ".mysqli_num_rows($result)." sản phẩm được tìm thấy</b></div>";
							echo "<div class='col-lg-12'></br></div>";
							while ($item = mysqli_fetch_array($result)) {
								echo 
									"<div class='col-lg-12 text-center border' style='background-color: #ffd5cd;'>
										<b>$item[Ten_sua]</b>
									</div>
									<div class='col-lg-4 text-center border'>
										<img width='100%' src='../../images/Hinh_sua/$item[Hinh]'>
									</div>
									<div class='col-lg-8 border'>
										<h6><b>Thành phần dinh dưỡng: </b></h6>
										$item[TP_Dinh_Duong]
										<h6><b>Lợi ích: </b></h6>
										$item[Loi_ich]</br>
										<b>Trọng lượng: </b>
										<font color='#cc0e74'>
											$item[Trong_luong] gr
										</font> - 
										<b>Đơn giá: </b>
										<font color='#cc0e74'>
										".number_format($item['Don_gia'])." VNĐ
										</font>
									</div>";
							}
						}
						else{
							echo 
							"<div class='col-lg-12 text-center'>
								<b>Không tìm thấy sản phẩm</b>
							</div>";
						}
						echo "</div>";
					}
				}
				
				mysqli_close($conn);
			 ?>
		</div>
	</form>
</body>
</html>