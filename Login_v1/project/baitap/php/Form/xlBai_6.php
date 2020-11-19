<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kết quả</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
		<?php 
			$flags = array(
				"submit" => false,
				"first" => false,
				"second" => false,
				"valid" => false
			);

			if (isset($_POST['first'])) {
				$first = $_POST['first'];
				$flags["first"] = (is_numeric($first) || is_float($first));
			}
			else
				$first = false;

			if (isset($_POST['second'])) {
				$second = $_POST['second'];
				$flags["second"] = (is_numeric($second) || is_float($second));
			}
			else
				$second = false;

			switch ($_POST['arithmetic']) {
				case 'addition':
					$arithmetic = "Cộng";
					if ($flags["first"] && $flags["second"]) {
						$result = $first + $second;
						$flags["valid"] = true;
					}
					else
						$result = 'NaN';
					break;

				case 'subtraction':
					$arithmetic = "Trừ";
					if ($flags["first"] && $flags["second"]) {
						$result = $first - $second;
						$flags["valid"] = true;
					}
					else
						$result = 'NaN';
					break;

				case 'multiplication':
					$arithmetic = "Nhân";
					if ($flags["first"] && $flags["second"]) {
						$result = $first * $second;
						$flags["valid"] = true;
					}
					else
						$result = 'NaN';
					break;

				case 'division':
					$arithmetic = "Chia";
					if ($flags["first"] && $flags["second"] && $_POST['second'] != 0) {
						$result = $first / $second;
						$flags["valid"] = true;
					}
					else
						$result = 'NaN';
					break;
			}
		 ?>
	<form action="" method="get" >
		<div class="grid-container">
			<div class="grid-item item1-3 text-center">
				<h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
			</div>
			<div class="grid-item item1-3"><hr></div>
			<?php 
				if (!($flags["first"] && $flags["second"])) {
					echo "<div class=\"grid-item text-right\" style=\"color: red;\"><h4>LỖI: &nbsp;</h4></div>";
					echo "<div class=\"grid-item\" style=\"color: red;\"><h4>Vui lòng nhập số!</h4></div>";
				}
				elseif (!$flags["valid"]) {
					echo "<div class=\"grid-item text-right\" style=\"color: red;\"><h4>LỖI: &nbsp;</h4></div>";
					echo "<div class=\"grid-item\" style=\"color: red;\"><h4>Số chia phải khác 0!</h4></div>";
				}
			 ?>
			<div class="grid-item text-right">
				<h4>Phép tính: &nbsp;</h4>
			</div>
			<div class="grid-item">
				<h4 style="color: red"><b><?php echo($arithmetic) ?></b></h4>
			</div>

			<div class="grid-item text-right">
				<h4>Số 1: &nbsp;</h4>
			</div>
			<div class="grid-item">
				<input type="text" value="<?php echo($first) ?>">
			</div>

			<div class="grid-item text-right">
				<h4>Số 2: &nbsp;</h4>
			</div>
			<div class="grid-item">
				<input type="text" value="<?php echo($second) ?>">
			</div>

			<div class="grid-item text-right">
				<h4>Kết quả: &nbsp;</h4>
			</div>
			<div class="grid-item">
				<input type="text" disabled="disabled" value="<?php echo($result) ?>">
			</div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<a href="javascript:window.history.back(-1);">Quay lại trang trước.</a>
			</div>
		</div>
	</form>
</body>
</html>