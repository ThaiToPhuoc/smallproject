<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Object Oriented Programming</title>
	<link rel="stylesheet" href="css/grid.css">
</head>
<body>
	<?php 
		/**
		 * 
		 */
		abstract class Shape
		{
			protected $name;
			protected $length;

			public function setName($name){
				$this->name = $name;
			}

			public function setLength($length){
				$this->length = $length;
			}

			public function getName(){
				return $this->name;
			}

			public function getLength(){
				return $this->length;
			}

			public abstract function tinhChuVi();
			public abstract function tinhDienTich();
			public abstract function hienThiKetQua();
		}

		/**
		 * 
		 */
		class Square extends Shape
		{
			public function tinhChuVi(){
				return $this->length * 4;
			}

			public function tinhDienTich(){
				return $this->length * $this->length;
			}

			public function hienThiKetQua(){
				return 
					"Chu vi hình vuông: ".$this->tinhChuVi().
					"\nDiện tích hình vuông: ".$this->tinhDienTich();
			}
		}

		class Circle extends Shape
		{
			const PI = 3.14;
			public function tinhChuVi(){
				return 2 * self::PI *$this->length;
			}

			public function tinhDienTich(){
				return self::PI * pow($this->length, 2);
			}

			public function hienThiKetQua(){
				return 
					"Chu vi hình tròn: ".$this->tinhChuVi().
					"\nDiện tích hình tròn: ".$this->tinhDienTich();
			}
		}

		class Triangle extends Shape
		{
			public function tinhChuVi(){
				return $this->length * 3;
			}

			public function tinhDienTich(){
				$p = $this->tinhChuVi()/2;
				return sqrt($p * pow($p - $this->length, 3));
			}

			public function hienThiKetQua(){
				return 
					"Chu vi tam giác đều: ".$this->tinhChuVi().
					"\nDiện tích tam giác đều: ".$this->tinhDienTich();
			}
		}

		/**
		 * 
		 */
		class ShapeFactory
		{
			public function getShape($type){
				switch ($type) {
					case 'SQU':
						return new Square();

					case 'CIR':
						return new Circle();

					case 'TRI':
						return new Triangle();

					default:
						return null;
				}
			}
		}

		$flags = array(false, false, false, false);
		if (isset($_POST['shape'])) {
			$factory = new ShapeFactory();
			$shape = $factory->getShape($_POST['shape']);
			$flags[0] = true;
			$type = $_POST['shape'];
		}
		else
			$type = '';

		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			$shape->setName($name);
			$flags[1] = true;
		}
		else
			$name = '';

		if (isset($_POST['length'])) {
			$length = $_POST['length'];
			$flags[2] = true;
			if (is_numeric($length)) {
				$shape->setLength($length);
				$flags[3] = true;
			}
			else
				$length = 0;
		}
		else
			$length = 0;

		if (!in_array(false, $flags)) {
			$results = $shape->hienThiKetQua();
		}
		else
			$results = '';
	 ?>

	<form action="" method="POST">
		<fieldset class="grid-container wider">
			<legend>Tính chu vi và diện tích hình học</legend>

			<div class="grid-item">Chọn hình: </div>
			<div class="grid-item">
				<input type="radio" name="shape" value="SQU"
					<?php 
						if (strcmp($type, "SQU") == 0)
							echo "checked=\"checked\"";
					 ?>
				> Hình vuông
				<input type="radio" name="shape" value="CIR"
					<?php 
						if (strcmp($type, "CIR") == 0)
							echo "checked=\"checked\"";
					 ?>
				> Hình tròn
				<input type="radio" name="shape" value="TRI"
					<?php 
						if (strcmp($type, "TRI") == 0)
							echo "checked=\"checked\"";
					 ?>
				> Hình tam giác
			</div>

			<div class="grid-item">Nhập tên: </div>
			<div class="grid-item">
				<input type="text" name="name" value="<?php echo($name) ?>">
			</div>

			<div class="grid-item">Nhập độ dài: </div>
			<div class="grid-item">
				<input type="text" name="length" value="<?php echo($length) ?>">
			</div>

			<div class="grid-item">Kết quả: </div>
			<div class="grid-item">
				<textarea name="results" rows="4"><?php echo "$results"; ?></textarea>
			</div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<input type="submit" name="submit" value="TÍNH">
			</div>
		</fieldset>
	</form>
</body>
</html>