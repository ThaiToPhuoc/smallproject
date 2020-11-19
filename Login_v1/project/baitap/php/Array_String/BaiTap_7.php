<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thay thế</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		function swap($arr, $old, $new){
			for ($i=0; $i < count($arr); $i++) { 
				if($arr[$i] == $old)
				$arr[$i] = $new;
			}

			return $arr;
		}

		function outArray($arr){
			return implode(" ", $arr);
		}

		if (isset($_POST['oldNumber'])) 
			$oldNumber = $_POST['oldNumber'];
		else
			$oldNumber = '';

		if (isset($_POST['newNumber'])) 
			$newNumber = $_POST['newNumber'];
		else
			$newNumber = '';
		
		if (!empty($_POST['array'])) {
			$array = $_POST['array'];
			$arr = explode(",", $array);

			$oldArray = outArray($arr);
			$arr = swap($arr, $oldNumber, $newNumber);
			$newArray = outArray($arr);
		}
		else{
			$array = '';
			$oldArray = "Rỗng...";
			$newArray = "Rỗng...";
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3-even">
			<div class="grid-item item1-4 text-center">
				<h3>THAY THẾ</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item">Nhập các phần tử:</div>
			<div class="grid-item item2-4">
				<input type="text" name="array" value="<?php echo($array) ?>" required>
			</div>

			<div class="grid-item">Giá trị cần thay thế:</div>
			<div class="grid-item">
				<input type="number" name="oldNumber" value="<?php echo($oldNumber) ?>" required>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item">Giá trị thay thế:</div>
			<div class="grid-item">
				<input type="number" name="newNumber" value="<?php echo($newNumber) ?>" required>
			</div>
			<div class="grid-item">
				<input class="submit" type="submit" value="Thay thế">
			</div>

			<div class="grid-item">Mảng cũ:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($oldArray) ?>" disabled>
			</div>

			<div class="grid-item">Mảng sau khi thay thế:</div>
			<div class="grid-item item2-4">
				<input type="text" value="<?php echo($newArray) ?>" disabled>
			</div>

			<div class="grid-item item1-4 text-center">
				(
				<font class="error">Ghi chú: </font>
				Các phần tử trong mảng sẽ cách hau bằng dấu ','
				)
			</div>
		</div>
	</form>
</body>
</html>