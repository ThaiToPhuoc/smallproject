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
		$flags = array(false, false, false);
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		else
			$name = '';

		if (isset($_POST['oldPrice']) && is_numeric($_POST['oldPrice'])) {
			$oldPrice = $_POST['oldPrice'];
			$flags[0] = true;
		}
		else
			$oldPrice='';

		if (isset($_POST['newPrice']) && is_numeric($_POST['newPrice'])) {
			$newPrice = $_POST['newPrice'];
			$flags[1] = true;
		}
		else
			$newPrice = '';

		if (isset($_POST['price']) && is_numeric($_POST['price'])) {
			$price = $_POST['price'];
			$flags[2] = true;
		}

		if (!in_array(false, $flags)) {
			$total = ($newPrice - $oldPrice) * $price;
		}
		else
			$total = '';
	 ?>

	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>THANH TOÁN TIỀN ĐIỆN</h3>
			</div>
			<div class="grid-item item1-4">
				<hr>
			</div>
			<div class="grid-item">
				<h4>Tên chủ hộ: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="name" value="<?php echo($name) ?>">
				<?php 
					if (empty($name) && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng không dể trống!</font>";
					}
				?>
			</div>
			<div class="grid-item"></div>

			<div class="grid-item">
				<h4>Chỉ số cũ: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="oldPrice" value="<?php echo($oldPrice) ?>">
				<?php 
					if (empty($oldPrice) && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số!</font>";
					}
				?>
			</div>
			<div class="grid-item">(Kw)</div>

			<div class="grid-item">
				<h4>Chỉ số mới: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="newPrice" value="<?php echo($newPrice) ?>">
				<?php 
					if (empty($newPrice) && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số!</font>";
					}
				?>
			</div>
			<div class="grid-item">(Kw)</div>

			<div class="grid-item">
				<h4>Đơn giá: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="price" value="<?php echo(isset($price)?$price:20000) ?>">
				<?php 
					if (empty($price) && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số!</font>";
					}
				?>
			</div>
			<div class="grid-item">(VNĐ)</div>

			<div class="grid-item">
				<h4>Số tiền thanh toán: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="total" disabled="disabled" value="<?php echo($total) ?>" >
			</div>
			<div class="grid-item">(VNĐ)</div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<input type="submit" name="submit" value="Tính">
			</div>
			<div class="grid-item"></div>
		</div>
	</form>
</body>
</html>