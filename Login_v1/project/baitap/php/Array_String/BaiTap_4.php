<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		if (!empty($_POST['array'])) {
			$array = $_POST['array'];
			$arr = explode(",", $array);
			$result = 0;
			$str = implode(" + ", $arr);
			foreach ($arr as $value) {
				$result += $value;
			}

			$str = date("d-m-Y  H:i:s")." : ".$str." = ".$result."\n";

			$fp = fopen("dulieu_BaiTap_4.txt", "a");
			fwrite($fp, $str);
			fclose($fp);
		}
		else{
			$array = '';
			$result = 0;
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item"><h4>Nhập dãy số:</h4></div>
			<div class="grid-item">
				<input type="text" name="array" required value="<?php echo($array) ?>">
			</div>
			<div class="grid-item">
				<input type="submit" name="submit" value="Tổng dãy số">
			</div>

			<div class="grid-item"><h4>Tổng dãy số:</h4></div>
			<div class="grid-item"><input type="number" name="result" value="<?php echo($result) ?>"></div>
		</div>
	</form>
</body>
</html>