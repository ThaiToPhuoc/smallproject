<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../../css/grid.css">
	<title>Thông tin sinh viên</title>
</head>
<body>
	<?php
		$array = array();
		if(file_exists("sv.txt")){
			$fp = fopen("sv.txt", "r");

			while(($line = fgets($fp)) != false){
					$arr = explode(",", trim($line));
					$array[$arr[0]] = array($arr[1],$arr[2],$arr[3],$arr[4],$arr[5]);
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
            $array[$ma_sv] = array($ten_sv, $gioi_tinh, $lop, $ngay_sinh, $dia_chi);
			$str = "";
			foreach ($array as $key => $val) {
				$str = $key.",".implode(",",$val)."\n";
			}
			$fp = fopen("sv.txt", "a");
			fwrite($fp, $str);
		}
		else if(isset($_POST['read'])){
			$arr = array();
			foreach ($array as $key => $value) {
				if($key == $_POST['msv']){   
                    $ma_sv = $key;
                    $ten_sv = $value[0];
                    $gioi_tinh = $value[1];
                    $lop = $value[2];
                    $ngay_sinh = $value[3];
                    $dia_chi = $value[4];
					break;
				}
			}
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
    
	<h1 align="center">HIEN THI THONG TIN SINH VIEN</h1>
	 <form action="Bai14.php" method="POST">
	 	<div>
	 		<select name="msv">
		 		<?php
                 foreach($array as $key => $value)
                 {
                    if($key == $_POST['msv'])
                        echo "<option>".$key."</option>";
                    else
                        echo "<option selected>".$key."</option>";
                 }
		 			/*for ($i=0; $i < count($array); $i++) {
		 				if($i != 0 && $array[$i][0] != $_POST['msv'])
		 					echo "<option>".$array[$i][0]."</option>";
		 				else
		 					echo "<option selected>".$array[$i][0]."</option>";
		 			}*/
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
		 				<td><input type="radio" name="gioi_tinh" value="Nam" checked> Nam
                         <input type="radio" name="gioi_tinh" value="Nu"
                            <?php 
                                if(isset($_POST['read']))
                                    echo ($gioi_tinh=='Nu')?'checked':''; 
                            ?>
                        > Nữ</td>
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

	 <p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		$array = array();
		if(file_exists("sv.txt")){
			$fp = fopen("sv.txt", "r");

			while(($line = fgets($fp)) != false){
					$arr = explode(",", trim($line));
					$array[$arr[0]] = array($arr[1],$arr[2],$arr[3],$arr[4],$arr[5]);
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
            $array[$ma_sv] = array($ten_sv, $gioi_tinh, $lop, $ngay_sinh, $dia_chi);
			$str = "";
			foreach ($array as $key => $val) {
				$str = $key.",".implode(",",$val)."\n";
			}
			$fp = fopen("sv.txt", "a");
			fwrite($fp, $str);
		}
		else if(isset($_POST['read'])){
			$arr = array();
			foreach ($array as $key => $value) {
				if($key == $_POST['msv']){   
                    $ma_sv = $key;
                    $ten_sv = $value[0];
                    $gioi_tinh = $value[1];
                    $lop = $value[2];
                    $ngay_sinh = $value[3];
                    $dia_chi = $value[4];
					break;
				}
			}
		}
		else{
			$ma_sv = "";
			$ten_sv = "";
			$gioi_tinh = "";
			$lop = "";
			$ngay_sinh = "";
			$dia_chi = "";
		}
	</textarea>
</body>
</html>