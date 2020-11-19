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
		define("currentYear", 2000);
		function isLeapYear($year){
			return ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0));
		}

		if (isset($_POST['year']) && !empty($_POST['year'])) {
			$arr = array();
			$year = $_POST['year'];
			foreach (range(currentYear, $year) as $value) {
				if(isLeapYear($value)) $arr[] = $value;
			}

			if(!empty($arr)) 
				$result = implode(" ", $arr)." là năm nhuận";
			else
				$result = "Không có năm nhuận";
		}
		else{
			$year = '';
			$result = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>TÍNH NĂM NHUẬN</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item"><h4>Năm:</h4></div>
			<div class="grid-item">
				<input type="number" name="year" value="<?php echo($year) ?>" required>
			</div>
			<div class="grid-item">
				<input type="submit" name="submit" value="TÌM NĂM NHUẬN">
			</div>

			<div class="item1-4">
				<p style="text-align: center;"><?php echo $result; ?></p>
					
			</div>
		</div>
	</form>
</body>
</html>