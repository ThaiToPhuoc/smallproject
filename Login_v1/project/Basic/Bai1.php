<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/grid.css">
	<title>Array</title>
</head>
<body style="height: 150vh;">
	<?php 
		function getArray($n){
			$arr = array();
			for ($i=0; $i < $n; $i++) { 
				$arr[] = rand(-150, 150);
			}

			return $arr;
		}

		function countEven($arr){
			$count = 0;
			foreach ($arr as $value) {
				if($value % 2 == 0) $count++;
			}

			return $count;
		}

		function countLessThan100($arr){
			$count = 0;
			foreach ($arr as $value) {
				if($value < 100) $count++;
			}

			return $count;
		}

		function getSumOfNegatives($arr){
			$sum = 0;
			foreach ($arr as $value) {
				if($value < 0) $sum+=$value;
			}

			return $sum;
		}

		function getZeroPositions($arr){
			$pos = array();
			foreach ($arr as $key => $value) {
				if($value == 0) $pos[] = $key;
			}

			if(empty($pos))
				return "None";
			return $pos;
		}

		if (isset($_POST['n']) && !empty($_POST['n'])) {
			$n = $_POST['n'];
			$arr = getArray($n);

			$results = implode(", ", $arr);
			$even = countEven($arr);
			$less = countLessThan100($arr);
			$sum = getSumOfNegatives($arr);
			$nega = getSumOfNegatives($arr);
			$posArr = getZeroPositions($arr);
			if(is_array($posArr))
				$pos = implode(", ", $posArr);
			else
				$pos = $posArr;

			sort($arr);
			$sorted = implode(", ", $arr);
		}
		else{
			$n = 0;
			$results = '';
			$even = 0;
			$less = 0;
			$nega = 0;
			$pos = "";
			$sorted = '';
		}
	 ?>

	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>MẢNG & CHUỖI</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item"><h4>Enter n:</h4></div>
			<div class="grid-item">
				<input name="n" type="number" value="<?php echo($n) ?>">
			</div>
			<div class="grid-item">
				<input name="submit" type="submit" value="compute" style="width: 5rem;">
			</div>

			<div class="grid-item"><h4>Array:</h4></div>
			<div class="item2-4">
				<textarea name="results" rows="10" disabled><?php echo "$results"; ?></textarea>
			</div>

			<div class="grid-item"><h4>Even number count:</h4></div>
			<div class="item2-4">
				<input type="text" name="even" value="<?php echo($even) ?>" disabled>
			</div>

			<div class="grid-item"><h4>Less than 100 count:</h4></div>
			<div class="item2-4">
				<input type="text" name="less" value="<?php echo($less) ?>" disabled>
			</div>

			<div class="grid-item"><h4>Sum of negatives:</h4></div>
			<div class="item2-4">
				<input type="text" name="nega" value="<?php echo($nega) ?>" disabled>
			</div>

			<div class="grid-item"><h4>Positions of zeroes:</h4></div>
			<div class="item2-4">
				<input type="text" name="pos" value="<?php echo($pos) ?>" disabled>
			</div>

			<div class="grid-item"><h4>Sorted array:</h4></div>
			<div class="item2-4">
				<textarea name="sorted" rows="10" disabled><?php echo "$sorted"; ?></textarea>
			</div>
		</div>
	</form>
	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
			function getArray($n){
				$arr = array();
				for ($i=0; $i < $n; $i++) { 
					$arr[] = rand(-150, 150);
				}

				return $arr;
			}

			function countEven($arr){
				$count = 0;
				foreach ($arr as $value) {
					if($value % 2 == 0) $count++;
				}

				return $count;
			}

			function countLessThan100($arr){
				$count = 0;
				foreach ($arr as $value) {
					if($value < 100) $count++;
				}

				return $count;
			}

			function getSumOfNegatives($arr){
				$sum = 0;
				foreach ($arr as $value) {
					if($value < 0) $sum+=$value;
				}

				return $sum;
			}

			function getZeroPositions($arr){
				$pos = array();
				foreach ($arr as $key => $value) {
					if($value == 0) $pos[] = $key;
				}

				if(empty($pos))
					return "None";
				return $pos;
			}

			if (isset($_POST['n']) && !empty($_POST['n'])) {
				$n = $_POST['n'];
				$arr = getArray($n);

				$results = implode(", ", $arr);
				$even = countEven($arr);
				$less = countLessThan100($arr);
				$sum = getSumOfNegatives($arr);
				$nega = getSumOfNegatives($arr);
				$posArr = getZeroPositions($arr);
				if(is_array($posArr))
					$pos = implode(", ", $posArr);
				else
					$pos = $posArr;

				sort($arr);
				$sorted = implode(", ", $arr);
			}
			else{
				$n = 0;
				$results = '';
				$even = 0;
				$less = 0;
				$nega = 0;
				$pos = "";
				$sorted = '';
			}
	</textarea>

</body>
</html>