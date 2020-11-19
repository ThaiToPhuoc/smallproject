<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$array = array();
		if(file_exists("hs.txt")){
			$fp = fopen("hs.txt", "r");

			while(($line = fgets($fp)) != false){
					$arr = explode(",", trim($line));
					$array[] = $arr;
				}

			fclose($fp);
		}

		if (isset($_POST['submit'])) {
			$ma_sv = $_POST['ma_sv'];
			$ten_sv = $_POST['ten_sv'];
			$gioi_tinh = $_POST['gioi_tinh'];
			$lop = $_POST['lop'];
			$ngay_sinh = $_POST['ngay_sinh'];
			$dia_chi = $_POST['dia_chi'];

			$array[] = array($ma_sv, $ten_sv, $gioi_tinh, $lop, $ngay_sinh, $dia_chi);
			print_r($array);
			$str = "";
			foreach ($array as $val) {
				$str = $str.implode(",", $val)."\n";
			}
			$fp = fopen("hs.txt", "w");
			fwrite($fp, $str);
		}
		else if(isset($_POST['read'])){
			$arr = array();
			foreach ($array as $val) {
				if($val[0] == $_POST['msv']){
					$arr = $val;
					break;
				}
			}

			$ma_sv = $arr[0];
			$ten_sv = $arr[1];
			$gioi_tinh = $arr[2];
			$lop = $arr[3];
			$ngay_sinh = $arr[4];
			$dia_chi = $arr[5];
		}
		else{
			$ma_sv = "";
			$ten_sv = "";
			$gioi_tinh = "";
			$lop = "";
			$ngay_sinh = "";
			$dia_chi = "";
		}
	 ?>

	 <form action="" method="POST">
	 	<h1 align="center">HIEN THI THONG TIN SINH VIEN</h1>
	 	<div style="width: 100%; text-align: center;">
	 		<select name="msv">
		 		<?php
		 			for ($i=0; $i < count($array); $i++) {
		 				if($i != 0 && $array[$i][0] != $_POST['msv'])
		 					echo "<option>".$array[$i][0]."</option>";
		 				else
		 					echo "<option selected>".$array[$i][0]."</option>";
		 			}
		 		 ?>
		 	</select>
		 	<input type="submit" name="read" value="xem sinh viên">
	 	</div>
	 	
	 	<fieldset style="width: 500px; margin: auto;">
	 		<legend>THONG TIN SINH VIEN</legend>
	 		<table align="center">
		 		<tbody>
		 			<tr>
		 				<td>Mã số SV:</td>
		 				<td><input type="text" name="ma_sv" value="<?php echo($ma_sv) ?>"></td>
		 				<td>Họ tên:</td>
		 				<td><input type="text" name="ten_sv" value="<?php echo($ten_sv) ?>"></td>
		 			</tr>
		 			<tr>
		 				<td>Giới tính:</td>
		 				<td><input type="text" name="gioi_tinh" value="<?php echo($gioi_tinh) ?>"></td>
		 				<td>Lớp:</td>
		 				<td><input type="text" name="lop" value="<?php echo($lop) ?>"></td>
		 			</tr>
		 			<tr>
		 				<td>Ngày sinh:</td>
		 				<td><input type="date" name="ngay_sinh" value="<?php echo($ngay_sinh) ?>"></td>
		 				<td>Địa chỉ:</td>
		 				<td><input type="text" name="dia_chi" value="<?php echo($dia_chi) ?>"></td>
		 			</tr>
		 			<tr>
		 				<td></td>
		 				<td></td>
		 				<td></td>
		 				<td><input type="submit" name="submit" value="thêm sinh viên"></td>
		 			</tr>
		 		</tbody>
		 	</table>
	 	</fieldset>
	 </form>
</body>
</html>