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
		if (!empty($_POST['a']) && !empty($_POST['b'])) {
			$a = $_POST['a'];
			$b = $_POST['b'];
			$aArray = explode(",", trim($a));
			$bArray = explode(",", trim($b));

			$aCount = count($aArray);
			$bCount = count($bArray);

			$cArray = array_merge($aArray, $bArray);
			$c = implode(", ", $cArray);

			sort($cArray);
			$cA = implode(", ", $cArray);
			rsort($cArray);
			$cD = implode(", ", $cArray);
		}
		else{
			$a = '';
			$b = '';
			$aCount = 0;
			$bCount = 0;
			$c = '';
			$cA = '';
			$cD = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item">Mảng A:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($a); ?>" name="a" required>
			</div>

			<div class="grid-item">Mảng B:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($b); ?>" name="b" required>
			</div>

			<div class="grid-item"></div>
			<div class="grid-item item2-4">
				<input type="submit" name="submit" value="Thực hiện">
			</div>

			<div class="grid-item">Số phần tử mảng A:</div>
			<div class="grid-item">
				<input type="number" value="<?php echo($aCount); ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item">Số phần tử mảng B:</div>
			<div class="grid-item">
				<input type="number" value="<?php echo($bCount); ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item">Mảng C:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($c); ?>" disabled>
			</div>

			<div class="grid-item">Mảng C tăng dần:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($cA); ?>" disabled>
			</div>

			<div class="grid-item">Mảng C giảm dần:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($cD); ?>" disabled>
			</div>

			<div class="grid-item item1-4 text-center">
				(<font class="error">Ghi chú: </font>
				Các số được nhập cách nhau bằng dấu ',')
			</div>
		</div>
	</form>

	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		if (!empty($_POST['a']) && !empty($_POST['b'])) {
			$a = $_POST['a'];
			$b = $_POST['b'];
			$aArray = explode(",", trim($a));
			$bArray = explode(",", trim($b));

			$aCount = count($aArray);
			$bCount = count($bArray);

			$cArray = array_merge($aArray, $bArray);
			$c = implode(", ", $cArray);

			sort($cArray);
			$cA = implode(", ", $cArray);
			rsort($cArray);
			$cD = implode(", ", $cArray);
		}
		else{
			$a = '';
			$b = '';
			$aCount = 0;
			$bCount = 0;
			$c = '';
			$cA = '';
			$cD = '';
		}
	</textarea>
</body>
</html>