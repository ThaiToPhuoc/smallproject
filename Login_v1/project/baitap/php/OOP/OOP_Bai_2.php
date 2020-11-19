<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php 
		class PhanSo
		{
			private $tuSo;
			private $mauSo;

			function __construct($a, $b){
				$this->tuSo = $a;
				$this->mauSo = $b;
			}

			public function getTuSo(){
				return $this->tuSo;
			}

			public function getMauSo(){
				return $this->mauSo;
			}

			public function setTuSo($tuSo){
				$this->tuSo = $tuSo;
			}

			public function setMauSo($mauSo){
				$this->mauSo = $mauSo;
			}

			private function USCLN($a, $b){
				if($b == 0) return $a;

				return $this->USCLN($b, $a % $b);
			}

			public function toiGian(){
				$uscln = $this->USCLN($this->tuSo, $this->mauSo);
				$this->tuSo /= $uscln;
				$this->mauSo /= $uscln;
			}
		}

		abstract class PhepTinh{
			public abstract function tinhToan($a, $b);
		}

		class CongPhanSo extends PhepTinh
		{
			public function tinhToan($a, $b){
				$c = new PhanSo(0, 0);
				$c->setTuSo(($a->getTuSo() * $b->getMauSo()) + ($b->getTuSo() * $a->getMauSo()));
				$c->setMauSo($a->getMauSo() * $b->getMauSo());
				$c->toiGian();
				return $c;
			}
		}

		class TruPhanSo extends PhepTinh
		{
			public function tinhToan($a, $b){
				$c = new PhanSo(0, 0);
				$c->setTuSo(($a->getTuSo() * $b->getMauSo()) - ($b->getTuSo() * $a->getMauSo()));
				$c->setMauSo($a->getMauSo() * $b->getMauSo());
				$c->toiGian();
				return $c;
			}
		}

		class NhanPhanSo extends PhepTinh
		{
			public function tinhToan($a, $b){
				$c = new PhanSo(0, 0);
				$c->setTuSo($a->getTuSo() * $b->getTuSo());
				$c->setMauSo($a->getMauSo() * $b->getMauSo());
				$c->toiGian();
				return $c;
			}
		}

		class ChiaPhanSo extends PhepTinh
		{
			public function tinhToan($a, $b){
				$c = new PhanSo(0, 0);
				$c->setTuSo($a->getTuSo() * $b->getMauSo());
				$c->setMauSo($a->getMauSo() * $b->getTuSo());
				$c->toiGian();
				return $c;
			}
		}

		class PhepTinhFactory{
			public static function createPhepTinh($a, $b, $type){
				switch ($type) {
					case 'CONG':
						return new CongPhanSo($a, $b);

					case 'TRU':
						return new TruPhanSo($a, $b);

					case 'NHAN':
						return new NhanPhanSo($a, $b);

					case 'CHIA':
						return new ChiaPhanSo($a, $b);

					default:
						return null;
				}
			}
		}

		function getPhepTinh($type){
			switch ($type) {
					case 'CONG':
						return "+";

					case 'TRU':
						return "-";

					case 'NHAN':
						return "&times;";

					case 'CHIA':
						return "&#247;";

					default:
						return null;
				}
		}

		$kq = "";
		if(isset($_POST['submit'])){
			$type = $_POST['pheptinh'];
			$tsa = $_POST['tuSoA'];
			$msa = $_POST['mauSoA'];
			$tsb = $_POST['tuSoB'];
			$msb = $_POST['mauSoB'];

			if ($msa == 0 || $msb == 0) {
				$kq = "Mẫu số phải khác 0";
			}
			else{
				$a = new PhanSo($tsa, $msa);
				$b = new PhanSo($tsb, $msb);
				$pt = PhepTinhFactory::createPhepTinh($a, $b, $type);
				$c = $pt->tinhToan($a, $b);
				$kq = 	$a->getTuSo()."&frasl;".$a->getMauSo().
						" ".getPhepTinh($type)." ".
						$b->getTuSo()."&frasl;".$b->getMauSo().
						" = ".
						$c->getTuSo()."&frasl;".$c->getMauSo();
			}
		}
		else{
			$type = "";
			$tsa = "";
			$msa = "";
			$tsb = "";
			$msb = "";
		}
	 ?>

	 <form action="" method="POST">
	 	<div class="grid-container-4">
	 		<div class="grid-item item1-5 text-center"><h3>Các phép tính trên phân số</h3></div>

	 		<div class="grid-item item1-5"><hr></div>
	 		<div class="grid-item item1-5"><h4>Nhập phân số thứ 1:</h4></div>

	 		<div class="grid-item">Tử số:</div>
	 		<div class="grid-item half"><input type="number" value="<?php echo($tsa) ?>" name="tuSoA" required></div>
	 		<div class="grid-item">Mẫu số:</div>
	 		<div class="grid-item half"><input type="number" value="<?php echo($msa) ?>" name="mauSoA" required></div>

	 		<div class="grid-item item1-5"><hr size="1"></div>
	 		<div class="grid-item item1-5"><h4>Nhập phân số thứ 2:</h4></div>

	 		<div class="grid-item">Tử số:</div>
	 		<div class="grid-item half"><input type="number" value="<?php echo($tsb) ?>" name="tuSoB" required></div>
	 		<div class="grid-item">Mẫu số:</div>
	 		<div class="grid-item half"><input type="number" value="<?php echo($msb) ?>" name="mauSoB" required></div>

	 		<div class="grid-item item1-5" style="margin-top: 10px;">
	 			<fieldset style="padding: 20px;">
		 			<legend>Chọn phép tính</legend>
		 			<input type="radio" name="pheptinh" value="CONG" checked> Cộng
		 			<input type="radio" name="pheptinh" value="TRU" <?php echo ($type == "TRU")?"checked":"" ?>> Trừ
		 			<input type="radio" name="pheptinh" value="NHAN" <?php echo ($type == "NHAN")?"checked":"" ?>> Nhân
		 			<input type="radio" name="pheptinh" value="CHIA" <?php echo ($type == "CHIA")?"checked":"" ?>> Chia
		 		</fieldset>
	 		</div>

	 		<div class="grid-item item1-5 text-right"><input type="submit" name="submit" value="Kết quả"></div>
	 		<div class="grid-item item1-5"><hr></div>
	 		<div class="grid-item item1-5">
	 			<h2>
	 				<?php echo $kq; ?>
	 			</h2>
	 		</div>

	 	</div>
	 </form>
</body>
</html>