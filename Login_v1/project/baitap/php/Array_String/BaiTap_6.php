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
		function search($x, $arr){
			if(count($arr) == 0) return -1;
			for ($i=0; $i < count($arr); $i++) { 
				if($arr[$i] == $x) return $i + 1;
			}

			return -1;
		}

		if (!empty($_POST['search'])) {
			$search = $_POST['search'];
			$input = $_POST['input'];
			$arr = explode(",", $input);
			$x = search($search, $arr);
			$array = implode(", ", $arr);
			if($x == -1)
				$result = "Không tìm thấy ".$search." trong mảng";
			else
				$result = "Tìm thấy ".$search." tại vị trí ".$x." của mảng";
		}
		else{
			$input = '';
			$search = '';
			$array = '';
			$result = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3-even">
			<div class="grid-item item1-4 text-center">
				<h3>TÌM KIẾM</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item">Nhập mảng:</div>
			<div class="grid-item item2-4">
				<input type="text" name="input" value="<?php echo($input) ?>" required>
			</div>

			<div class="grid-item">Nhập số cần tìm:</div>
			<div class="grid-item">
				<input type="number" name="search" value="<?php echo($search) ?>">
			</div>
			<div class="grid-item">
				<input class="submit" type="submit" name="submit" value="Tìm kiếm">
			</div>

			<div class="grid-item">Mảng:</div>
			<div class="grid-item item2-4">
				<input type="text" name="array" value="<?php echo($array) ?>" disabled>
				
			</div>

			<div class="grid-item">Kết quả:</div>
			<div class="grid-item item2-4">
				<input type="text" name="result" value="<?php echo($result) ?>" disabled>
			</div>

			<div class="grid-item item1-4" style="text-align: center;">
				(Các phần tử trong mảng sẽ cách nhau bằng dấu ',')
			</div>
		</div>
	</form>
</body>
</html>