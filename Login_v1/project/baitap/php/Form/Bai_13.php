<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/grid.css">
	<title>Document</title>
</head>
<body>
	<?php 
		$MIN = 10;
		$MAX = 24;
		$flags = array(false, false, false);
		if (isset($_POST['start']) && is_numeric($_POST['start']) &&
			$_POST['start'] <= $MAX && $_POST['start'] >= $MIN
		) {
			$start = $_POST['start'];
			$flags[0] = true;
		}
		else
			$start = '';


		if (isset($_POST['end']) && is_numeric($_POST['end']) &&
			$_POST['end'] <= $MAX && $_POST['end'] >= $MIN
		) {
			$end = $_POST['end'];
			$flags[1] = true;
			if ($flags[0] && $end > $start) {
				$flags[2] = true;
			}
		}
		else
			$end = '';

		if (!in_array(false, $flags)) {
			$delta = $end - $start;
			if ($start >= 17) {
				$total = $delta * 45000;
			}
			elseif ($end <= 17) {
				$total = $delta * 20000;
			}
			else{
				$lower = 17 - $start;
				$total = ($delta - $lower) * 45000 + $lower * 20000;
			}
		}
		else
			$total = '';
	 ?>

	<form action="" method="POST">
		<div class="grid-container-3">
			<div class="grid-item item1-4 text-center">
				<h3>TÍNH TIỀN KARAOKE</h3>
			</div>
			<div class="grid-item item1-4">
				<hr>
			</div>
			<div class="grid-item">
				<h4>Giờ bắt đầu: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="start" value="<?php echo($start) ?>">
				<?php 
					if (!$flags[0] && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập giá trị từ 10 đến 17!</font>";
					}
				 ?>
			</div>
			<div class="grid-item">
				<h4>&nbsp;(h)</h4>
			</div>

			<div class="grid-item">
				<h4>Giờ kết thúc: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="end" value="<?php echo($end) ?>">
				<?php 
					if (isset($_POST['submit'])) {
						if (!$flags[1]) {
							echo "<br><font color='red'>Vui lòng nhập giá trị từ 10 đến 17!</font>";
						}
						else if (!$flags[2]) {
							echo "<br><font color='red'>Giờ kết thúc phải lớn hơn giờ bắt đầu</font>";
						}
					}
				 ?>
			</div>
			<div class="grid-item">
				<h4>&nbsp;(h)</h4>
			</div>

			<div class="grid-item">
				<h4>Tiền thanh toán: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="total" disabled="disabled" value="<?php echo($total) ?>">
			</div>
			<div class="grid-item">
				<h4>&nbsp;(VNĐ)</h4>
			</div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<input type="submit" value="Tính tiền" name="submit">
			</div>
			<div class="grid-item"></div>
		</div>
	</form>
</body>
</html>