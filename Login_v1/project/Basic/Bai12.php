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
		$flags = array(false, false, false, false);
		$scores = array();
		$MIN = 0.0;
		$MAX = 10.0;
		if (isset($_POST['math']) && (is_float($_POST['math']) || is_numeric($_POST['math'])) &&
			$_POST['math'] >= $MIN && $_POST['math'] <= $MAX
		) {
			$math = $_POST['math'];
			$flags[0] = true;
			$scores[] = $math;
		}
		else
			$math = '';

		if (isset($_POST['physics']) && (is_numeric($_POST['physics']) || is_float($_POST['physics'])) &&
			$_POST['physics'] >= $MIN && $_POST['physics'] <= $MAX
		) {
			$physics = $_POST['physics'];
			$flags[1] = true;
			$scores[] = $physics;
		}
		else
			$physics = '';

		if (isset($_POST['chemistry']) && (is_numeric($_POST['chemistry']) || is_float($_POST['chemistry'])) &&
			$_POST['chemistry'] >= $MIN && $_POST['chemistry'] <= $MAX
		) {
			$chemistry = $_POST['chemistry'];
			$flags[2] = true;
			$scores[] = $chemistry;
		}
		else
			$chemistry = '';

		if (isset($_POST['stand']) && (is_numeric($_POST['stand']) || is_float($_POST['stand']))) {
			$stand = $_POST['stand'];
			$flags[3] = true;
		}
		else
			$stand = '';

		if (!in_array(false, $flags)) {
			$total = $math + $physics + $chemistry;
			if ($total >= $stand && !in_array(0, $scores)) {
				$result = 'Đậu';
			}
			else
				$result = 'Rớt';
		}
		else{
			$total = '';
			$result = '';
		}
	 ?>

	<form action="" method="POST">
		<div class="grid-container">
			<div class="grid-item item1-3 text-center">
				<h3>KẾT QUẢ THI ĐẠI HỌC</h3>
			</div>
			<div class="grid-item item1-3">
				<hr>
			</div>
			<div class="grid-item">
				<h4>Toán: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="math" value="<?php echo($math) ?>">
				<?php 
					if (!$flags[0] && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số từ 0 đến 10!</font>";
					}
				 ?>
			</div>

			<div class="grid-item">
				<h4>Lý: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="physics" value="<?php echo($physics) ?>">
				<?php 
					if (!$flags[1] && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số từ 0 đến 10!</font>";
					}
				 ?>
			</div>

			<div class="grid-item">
				<h4>Hóa: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="chemistry" value="<?php echo($chemistry) ?>">
				<?php 
					if (!$flags[2] && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số từ 0 đến 10!</font>";
					}
				 ?>
			</div>

			<div class="grid-item">
				<h4>Điểm chuẩn</h4>
			</div>
			<div class="grid-item">
				<input style="color: red;" type="text" name="stand" value="<?php echo($stand) ?>">
				<?php 
					if (!$flags[3] && isset($_POST['submit'])) {
						echo "<br><font color='red'>Vui lòng nhập số!</font>";
					}
				 ?>
			</div>

			<div class="grid-item">
				<h4>Tổng điểm</h4>
			</div>
			<div class="grid-item">
				<input type="text" disabled="disabled" name="total" value="<?php echo($total) ?>">
			</div>

			<div class="grid-item">
				<h4>Kết quả thi</h4>
			</div>
			<div class="grid-item">
				<input type="text" disabled="disabled" name="result" value="<?php echo($result) ?>">
			</div>

			<div class="grid-item">
			</div>
			<div class="grid-item">
				<input type="submit" value="Xem kết quả" name="submit">
			</div>
		</div>
	</form>

	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		$flags = array(false, false, false, false);
		$scores = array();
		$MIN = 0.0;
		$MAX = 10.0;
		if (isset($_POST['math']) && (is_float($_POST['math']) || is_numeric($_POST['math'])) &&
			$_POST['math'] >= $MIN && $_POST['math'] <= $MAX
		) {
			$math = $_POST['math'];
			$flags[0] = true;
			$scores[] = $math;
		}
		else
			$math = '';

		if (isset($_POST['physics']) && (is_numeric($_POST['physics']) || is_float($_POST['physics'])) &&
			$_POST['physics'] >= $MIN && $_POST['physics'] <= $MAX
		) {
			$physics = $_POST['physics'];
			$flags[1] = true;
			$scores[] = $physics;
		}
		else
			$physics = '';

		if (isset($_POST['chemistry']) && (is_numeric($_POST['chemistry']) || is_float($_POST['chemistry'])) &&
			$_POST['chemistry'] >= $MIN && $_POST['chemistry'] <= $MAX
		) {
			$chemistry = $_POST['chemistry'];
			$flags[2] = true;
			$scores[] = $chemistry;
		}
		else
			$chemistry = '';

		if (isset($_POST['stand']) && (is_numeric($_POST['stand']) || is_float($_POST['stand']))) {
			$stand = $_POST['stand'];
			$flags[3] = true;
		}
		else
			$stand = '';

		if (!in_array(false, $flags)) {
			$total = $math + $physics + $chemistry;
			if ($total >= $stand && !in_array(0, $scores)) {
				$result = 'Đậu';
			}
			else
				$result = 'Rớt';
		}
		else{
			$total = '';
			$result = '';
		}
	</textarea>
</body>
</html>