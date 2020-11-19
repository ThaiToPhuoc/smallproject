<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nhập liệu</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<form action="xlBai_6.php" method="POST">
		<div class="grid-container">
			<div class="grid-item item1-3 text-center">
				<h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
			</div>
			<div class="grid-item item1-3"><hr></div>
			<div class="grid-item">
				<h4>Chọn phép tính: </h4>
			</div>
			<div class="grid-item">
				<input type="radio" name="arithmetic" value="addition" checked=""> Cộng
				<input type="radio" name="arithmetic" value="subtraction"> Trừ
				<input type="radio" name="arithmetic" value="multiplication"> Nhân
				<input type="radio" name="arithmetic" value="division"> Chia
			</div>

			<div class="grid-item">
				<h4>Số thứ nhất: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="first">
			</div>

			<div class="grid-item">
				<h4>Số thứ hai: </h4>
			</div>
			<div class="grid-item">
				<input type="text" name="second">
			</div>

			<div class="grid-item">
				
			</div>
			<div class="grid-item">
				<input type="submit" name="submit" value="Tính">
			</div>
		</div>
	</form>
</body>
</html>