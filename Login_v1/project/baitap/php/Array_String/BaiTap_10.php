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
	function search($flower, $flowers){
		foreach ($flowers as $value) {
			$flower = str_replace(' ', '', $flower);
			if(strcasecmp($flower, str_replace(' ', '', $value)) == 0){
				return true;
			}
		}

		return false;
	}
		$flag = false;
		if(isset($_POST['flower'])){
			$flower = $_POST['flower'];
			if(!empty($_POST['flowers']))
				$arr = explode(" -- ", $_POST['flowers']);
			else
				$arr = array();

			if(!search($flower, $arr)){
				$flag = true;
				$arr[] = $flower;
			}

			$flowers = implode(" -- ", $arr);
		}
		else{
			$flower = '';
			$flowers = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3-even">
			<div class="grid-item item1-4 text-center">
				<h3>MUA HOA</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item">Loại hoa bạn chọn:</div>
			<div class="grid-item">
				<input type="text" value="<?php echo($flower); ?>" name="flower" required>
			</div>
			<div class="grid-item">
				<input class="submit" type="submit" name="submit" value="Thêm vào giỏ hoa">
			</div>

			<div class="grid-item item1-4">
				Giỏ hoa của bạn có:
				<?php 
					if(!$flag && isset($_POST['submit']))
						echo "<font class = \"error\">Hoa ".$flower." đã có trong giỏ hàng</font>";
				 ?>
			</div>

			<div class="grid-item item1-4">
				<textarea name="flowers" readonly><?php echo $flowers; ?></textarea>
			</div>
		</div>
	</form>
</body>
</html>