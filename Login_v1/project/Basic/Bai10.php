<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/grid.css">
	<title>Document</title>
</head>
<body>
	<?php 
			define("PI", 3.14);
			$error = '';
			if (isset($_POST["dientich"])) {
				$dientich = $_POST["dientich"];
			}
			else
				$dientich = 0;

			if (isset($_POST["chuvi"])) {
				$chuvi = $_POST["chuvi"];
			}
			else
				$chuvi = 0;

			if (isset($_POST["bankinh"])) {
				$bankinh = trim($_POST["bankinh"]);
				if (is_numeric($bankinh)) {
					$dientich = PI * pow($bankinh, 2);
					$chuvi = PI * 2 * $bankinh;
					$error='';
				}
				else{
					$error='Vui lòng nhập số!';
					$bankinh = 0;
				}
			}
			else
				$bankinh = 0;
	?>
	<form action="" method="post" name="dtcvHinhTron">

		 <div class="grid-container">
		 	<div class="grid-item item1-3 text-center">
		 		<h3>DIỆN TÍCH và CHU VI HÌNH TRÒN</h3>
		 	</div>
		 	<div class="grid-item item1-3"><hr></div>
		 	<div class="grid-item">Bán kính</div>
		 	<div class="grid-item">
		 		<input type="number" name="bankinh" value="<?php echo($bankinh);?>">
		 		<?php 
			    	if (!empty($error)) {
			    		echo "<font color='#FF3355'>".$error."</font>";
			    	}
			     ?>
		 	</div>

		 	<div class="grid-item">Diện tích</div>
		 	<div class="grid-item">
		 		<input type="number" name="dientich" disabled="disabled" value="<?php echo($dientich);?>">
		 	</div>

		 	<div class="grid-item">Chu vi</div>
		 	<div class="grid-item">
		 		<input type="number" name="chuvi" disabled="disabled" value="<?php echo($chuvi);?>">
		 	</div>

		 	<div class="grid-item"></div>
		 	<div class="grid-item">
		 		<input type="submit" value="Tính" name="tinh">
		 	</div>
		 	
		 </div>
	</form>
	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
			define("PI", 3.14);
			$error = '';
			if (isset($_POST["dientich"])) {
				$dientich = $_POST["dientich"];
			}
			else
				$dientich = 0;

			if (isset($_POST["chuvi"])) {
				$chuvi = $_POST["chuvi"];
			}
			else
				$chuvi = 0;

			if (isset($_POST["bankinh"])) {
				$bankinh = trim($_POST["bankinh"]);
				if (is_numeric($bankinh)) {
					$dientich = PI * pow($bankinh, 2);
					$chuvi = PI * 2 * $bankinh;
					$error='';
				}
				else{
					$error='Vui lòng nhập số!';
					$bankinh = 0;
				}
			}
			else
				$bankinh = 0;
	</textarea>
</body>
</html>