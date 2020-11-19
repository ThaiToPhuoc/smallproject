<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/table.css">
	<link rel="stylesheet" href="../../css/grid.css">
	<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost', 'root', '', 'qlbansua1');
		$sql_t = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
		$sql_p = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";

		$loai_sua = mysqli_query($conn, $sql_t);
		$hang_sua = mysqli_query($conn, $sql_p);

		$location = "../images/Hinh_sua/";
		$flag = false;
		if(isset($_POST['submit']) && isset($_FILES['anh'])){
			$name = basename($_FILES["anh"]["name"]);
			move_uploaded_file($_FILES["anh"]["tmp_name"], $location.$name);

			$hs = $_POST['hang'];
			$ls = $_POST['loai'];
			$ms = $_POST['ma_sua'];
			$ts = $_POST['ten_sua'];
			$tl = $_POST['trong_luong'];
			$dg = $_POST['don_gia'];
			$tpdd = $_POST['tpdd'];
			$li = $_POST['loi_ich'];

			$sql_n = 
			"INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) 
			VALUES ('$ms', '$ts', '$hs', '$ls', $tl, $dg, '$tpdd', '$li', '$name')";
			$flag = mysqli_query($conn, $sql_n);
		}
	 ?>
	<form action="" method="POST" style="width: 100%;" enctype="multipart/form-data">
		<div class="row w-50 mt-3" style="margin: auto;">
			<div class="col-lg-12 text-center">
				<h3>THÊM SỮA MỚI</h3>
				<hr class="w-100">
			</div>
			<div class="col-lg-5 mb-2">Mã sữa: </div>
			<div class="col-lg-7 mb-2">
				<input class="form-control" type="text" name="ma_sua" required>
			</div>
			<div class="col-lg-5 mb-2">Tên sữa: </div>
			<div class="col-lg-7 mb-2">
				<input class="form-control" type="text" name="ten_sua" required>
			</div>
			<div class="col-lg-5 mb-2">Hãng sữa: </div>
			<div class="col-lg-7 mb-2">
				<select class="form-control" name="hang" id="">
					<?php
						for ($i=0; $i < mysqli_num_rows($hang_sua); $i++) { 
							$array = mysqli_fetch_array($hang_sua);
							if($i == 0 || $hs == $array["Ma_hang_sua"])
								echo "<option value='$array[Ma_hang_sua]' selected>$array[Ten_hang_sua]</option>";
							else
								echo "<option value='$array[Ma_hang_sua]'>$array[Ten_hang_sua]</option>";
						}
					 ?>
				</select>
			</div>
			<div class="col-lg-5 mb-2">Loại sữa: </div>
			<div class="col-lg-7 mb-2">
				<select class="form-control" name="loai" id="">
					<?php
						for ($i=0; $i < mysqli_num_rows($loai_sua); $i++) { 
							$array = mysqli_fetch_array($loai_sua);
							if($i == 0 || $hs == $array["Ma_loai_sua"])
								echo "<option value='$array[Ma_loai_sua]' selected>$array[Ten_loai]</option>";
							else
								echo "<option value='$array[Ma_loai_sua]'>$array[Ten_loai]</option>";
						}
					 ?>
				</select>
			</div>
			<div class="col-lg-5 mb-2">Trọng lượng: </div>
			<div class="col-lg-5 mb-2">
				<input class="form-control" type="number" min="0" name="trong_luong" required>
			</div>
			<div class="col-lg-2 mb-2">(gr hoặc ml)</div>
			<div class="col-lg-5 mb-2">Đơn giá: </div>
			<div class="col-lg-5 mb-2">
				<input class="form-control" type="number" min="0" name="don_gia" required>
			</div>
			<div class="col-lg-2 mb-2">(VNĐ)</div>
			<div class="col-lg-5 mb-2">Thành phần dinh dưỡng: </div>
			<div class="col-lg-7 mb-2"><textarea class="form-control" name="tpdd" rows="2"></textarea></div>
			<div class="col-lg-5 mb-2">Lợi ích: </div>
			<div class="col-lg-7 mb-2"><textarea class="form-control" name="loi_ich" rows="2"></textarea></div>
			<div class="col-lg-5 mb-2">Hình ảnh: </div>
			<div class="col-lg-7 mb-2">
				<input type="file" name="anh" id="anh" required>
			</div>
			<div class="col-lg-12 mb-2 text-center">
				<input class="btn btn-info" type="submit" name="submit" value="Thêm mới">
			</div>
			<?php 
			if($flag){
				echo "<div class='col-lg-12 row'>";
					echo 
						"<div class='col-lg-12 text-center border' style='background-color: #ffd5cd;'>
							<b>$ts</b>
						</div>
						<div class='col-lg-4 text-center border'>
							<img width='100%' src='../../images/Hinh_sua/$name'>
						</div>
						<div class='col-lg-8 border'>
							<h6><b>Thành phần dinh dưỡng: </b></h6>
							$tpdd
							<h6><b>Lợi ích: </b></h6>
							$li</br>
								<b>Trọng lượng: </b>
							<font color='#cc0e74'>
								$tl gr
							</font> - 
							<b>Đơn giá: </b>
							<font color='#cc0e74'>
								".number_format($dg)." VNĐ
							</font>
						</div>";
					echo "</div>";
				}
			 ?>
		</div>
	</form>

	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		$conn = mysqli_connect('localhost', 'root', '', 'qlbansua1');
		$sql_t = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
		$sql_p = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";

		$loai_sua = mysqli_query($conn, $sql_t);
		$hang_sua = mysqli_query($conn, $sql_p);

		$location = "../images/Hinh_sua/";
		$flag = false;
		if(isset($_POST['submit']) && isset($_FILES['anh'])){
			$name = basename($_FILES["anh"]["name"]);
			move_uploaded_file($_FILES["anh"]["tmp_name"], $location.$name);

			$hs = $_POST['hang'];
			$ls = $_POST['loai'];
			$ms = $_POST['ma_sua'];
			$ts = $_POST['ten_sua'];
			$tl = $_POST['trong_luong'];
			$dg = $_POST['don_gia'];
			$tpdd = $_POST['tpdd'];
			$li = $_POST['loi_ich'];

			$sql_n = 
			"INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich, Hinh) 
			VALUES ('$ms', '$ts', '$hs', '$ls', $tl, $dg, '$tpdd', '$li', '$name')";
			$flag = mysqli_query($conn, $sql_n);
		}

		
		//Hiển thị hãng sữa và loại sữa
				for ($i=0; $i < mysqli_num_rows($hang_sua); $i++) { 
					$array = mysqli_fetch_array($hang_sua);
					if($i == 0 || $hs == $array["Ma_hang_sua"])
						echo "<option value='$array[Ma_hang_sua]' selected>$array[Ten_hang_sua]</option>";
					else
						echo "<option value='$array[Ma_hang_sua]'>$array[Ten_hang_sua]</option>";
				}

				for ($i=0; $i < mysqli_num_rows($loai_sua); $i++) { 
					$array = mysqli_fetch_array($loai_sua);
					if($i == 0 || $hs == $array["Ma_loai_sua"])
						echo "<option value='$array[Ma_loai_sua]' selected>$array[Ten_loai]</option>";
					else
						echo "<option value='$array[Ma_loai_sua]'>$array[Ten_loai]</option>";
				}
		//Hiển thị hãng sữa và loại sữa


	</textarea>
</body>
</html>