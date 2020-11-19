<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		function swap(&$a, &$b){
			$t = $a;
			$a = $b;
			$b = $t;
		}
		function acSort($arr){
			for ($i=0; $i < count($arr) - 1; $i++) { 
				for ($j=0; $j < count($arr) - $i - 1; $j++) { 
					if($arr[$j] > $arr[$j + 1])
						swap($arr[$j], $arr[$j + 1]);
				}
			}

			return $arr;
		}

		function dcSort($arr){
			for ($i=0; $i < count($arr) - 1; $i++) { 
				for ($j=0; $j < count($arr) - $i - 1; $j++) { 
					if($arr[$j] < $arr[$j + 1])
						swap($arr[$j], $arr[$j + 1]);
				}
			}

			return $arr;
		}

		if (!empty($_POST['array'])) {
			$array = $_POST['array'];
			$arr = explode(',', $array);
			$ascending = implode(", ", acSort($arr));
			$descending = implode(", ", dcSort($arr));

			$fp = fopen("dulieu_bai8.txt", "w");
			fwrite($fp, "Array: ".$array."\nAscending: ".$ascending."\nDescending: ".$descending);
			fclose($fp);
		}
		else{
			$fp = fopen("dulieu_bai8.txt", "w");
			fwrite($fp, "Empty file...");
			fclose($fp);
			$array = '';
			$ascending = '';
			$descending = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>SẮP XẾP MẢNG</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item">Nhập mảng:</div>
			<div class="grid-item">
				<input type="text" name="array" value="<?php echo($array) ?>" required>
			</div>
			<div class="grid-item error">(*)</div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<input type="submit" value="Sắp xếp tăng / giảm" name="submit">
			</div>
			<div class="grid-item"></div>

			<div class="grid-item item1-4 error">
				<b>Sau khi sắp xếp:</b>
			</div>

			<div class="grid-item">Tăng dần:</div>
			<div class="grid-item">
				<input type="text" value="<?php echo($ascending) ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item">Giảm dần:</div>
			<div class="grid-item">
				<input type="text" value="<?php echo($descending) ?>" disabled>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item item1-4 text-center">
				<font class="error">(*) </font>
				Các số được nhập cách nhau bằng dấu ','
			</div>

			<?php 
				if (isset($_POST['submit'])) {
					$fp = fopen("dulieu_bai8.txt", "r") or die("File không tồn tại...");
					echo 
					"<div class=\"grid-item item1-4 error\">
						<b>Nội dung file:</b>
					</div>";
					
					echo "<div class=\"grid-item item1-4\">";
					while(!feof($fp)){
						$line = fgets($fp);
						echo "<p>".$line."</p>";
					}
					echo "</div>";

					fclose($fp);
				}
			 ?>

			<!-- <div class="grid-item item1-4">
				<?php echo($contents[0]); ?>
			</div> -->
		</div>
	</form>
</body>
</html>