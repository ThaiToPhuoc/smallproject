<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Năm âm lịch</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		if (isset($_POST['westernYear'])) {
			$westernYear = $_POST['westernYear'];
			$canArr = array(
				"Quý", "Giáp", "Ất","Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"
			);

			$chiArr = array(
				"Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"
			);

			$nam = $westernYear - 3;
			$can = $nam%10;
			$chi = $nam%12;
			$lunarYear = $canArr[$can]." ".$chiArr[$chi];
		}
		else{
			$westernYear = '';
			$lunarYear = '';
			$pic = '';
		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container-3-even">
			<div class="grid-item item1-4 text-center">
				<h3>TÍNH NĂM ÂM LỊCH</h3>
			</div>
			<div class="grid-item item1-4"><hr></div>
			<div class="grid-item"><h4>Năm dương lịch</h4></div>
			<div class="grid-item"></div>
			<div class="grid-item"><h4>Năm âm lịch</h4></div>

			<div class="grid-item">
				<input type="number" name="westernYear" min="100" max="10000" value="<?php echo($westernYear) ?>">
			</div>
			<div class="grid-item">
				<input type="submit" name="submit" value="=>" style="width: 100%;">
			</div>
			<div class="grid-item">
				<input type="text" name="lunarYear" value="<?php echo($lunarYear) ?>">
			</div>

			<div class="item1-4" style="margin: auto;">
				<img src="<?php echo($pic) ?>" alt="">
			</div>
		</div>
	</form>
	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		if (isset($_POST['westernYear'])) {
			$westernYear = $_POST['westernYear'];
			$canArr = array(
				"Quý", "Giáp", "Ất","Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"
			);

			$chiArr = array(
				"Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"
			);

			$nam = $westernYear - 3;
			$can = $nam%10;
			$chi = $nam%12;
			$lunarYear = $canArr[$can]." ".$chiArr[$chi];
		}
		else{
			$westernYear = '';
			$lunarYear = '';
			$pic = '';
		}
	</textarea>
</body>
</html>