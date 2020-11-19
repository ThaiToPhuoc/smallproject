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
		/**
		 * 
		 */
		abstract class NhanVien
		{
			protected $hoTen;
			protected $gioiTinh;
			protected $ngayVaoLam;
			protected $heSoLuong;
			protected $soCon;
			protected $ngaySinh;
			const luongCanBan = 2000000;

			public abstract function tinhLuong();
			public abstract function tinhTroCap();
			public function tinhTienThuong(){
				$date = new DateTime(str_replace("/", "-", $this->ngayVaoLam));
				$date = date_diff($date, new DateTime());
				$year_diff = (int)$date->format("%y");

				return $year_diff * 1000000;
			}

			public function getHoTen(){
				return $this->hoTen;
			}

			public function getGioiTinh(){
				return $this->gioiTinh;
			}

			public function getNgayVaoLam(){
				return $this->ngayVaoLam;
			}

			public function getHeSoLuong(){
				return $this->heSoLuong;
			}

			public function getSoCon(){
				return $this->soCon;
			}

			public function getNgaySinh(){
				return $this->ngaySinh;
			}

			public function setHoTen($hoTen){
				$this->hoTen = $hoTen;
			}

			public function setGioiTinh($gioiTinh){
				$this->gioiTinh = $gioiTinh;
			}

			public function setNgayVaoLam($ngayVaoLam){
				$this->ngayVaoLam = $ngayVaoLam;
			}

			public function setHeSoLuong($heSoLuong){
				$this->heSoLuong = $heSoLuong;
			}

			public function setSoCon($soCon){
				$this->soCon = $soCon;
			}

			public function setNgaySinh($ngaySinh){
				$this->ngaySinh = $ngaySinh;
			}
		
		}

		/**
		 * 
		 */
		class NhanVienVanPhong extends NhanVien
		{
			const dinhMucVang = 3;
			const donGiaPhat = 100000;
			private $soNgayVang;

			public function tinhTienPhat(){
				if($this->soNgayVang > self::dinhMucVang)
					return $this->soNgayVang * self::donGiaPhat;

				return 0;
			}

			public function tinhTroCap(){
				$troCap = 200000 * $this->soCon;
				if($this->gioiTinh == "F") $troCap = $troCap * 1.5;

				return $troCap;
			}

			public function tinhLuong(){
				return self::luongCanBan * $this->heSoLuong - $this->tinhTienPhat();
			}

			public function getSoNgayVang(){
				return $this->soNgayVang;
			}

			public function setSoNgayVang($soNgayVang){
				$this->soNgayVang = $soNgayVang;
			}
		}

		/**
		 * 
		 */
		class NhanVienSanXuat extends NhanVien
		{
			const dinhMucSanPham = 50;
			const donGiaSanPham = 100000;
			private $soSanPham;

			public function tinhTienThuong(){
				if($this->soSanPham > self::dinhMucSanPham)
					return ($this->soSanPham - self::dinhMucSanPham) * self::donGiaSanPham * 0.03;

				return 0;
			}

			public function tinhTroCap(){
				return $this->soCon * 120000;
			}

			public function tinhLuong(){
				return ($this->soSanPham * self::donGiaSanPham) + $this->tinhTienThuong();
			}

			public function getSoSanPham(){
				return $this->soSanPham;
			}

			public function setSoSanPham($soSanPham){
				$this->soSanPham = $soSanPham;
			}
		}

		class NhanVienFactory
		{
			public static function create($type){
				switch ($type) {
					case "VP":
						return new NhanVienVanPhong();

					case "SX":
						return new NhanVienSanXuat();
					
					default:
						return null;
				}
			}
		}

		setlocale(LC_MONETARY, 'vi_VN');
		if(isset($_POST['submit'])){
			$type = $_POST['loaiNhanVien'];
			$nv = NhanVienFactory::create($type);
			$nv->setHoTen($_POST['ten']);
			$nv->setSoCon($_POST['soCon']);
			$nv->setNgayVaoLam($_POST['ngayVaoLam']);
			$nv->setNgaySinh($_POST['ngaySinh']);
			$nv->setGioiTinh($_POST['gioiTinh']);
			$nv->setHeSoLuong($_POST['heSoLuong']);

			if(strcmp($type, "VP") == 0){
				$nv->setSoNgayVang($_POST['soNgayVang']);
				$snv = $nv->getSoNgayVang();
				$ssp = '';
				$tp = $nv->tinhTienPhat();
			}
			else{
				$nv->setSoSanPham($_POST['soSanPham']);
				$ssp = $nv->getSoSanPham();
				$snv = '';
				$tp = 0;
			}

			$luong = $nv->tinhLuong();
			$t_cap = $nv->tinhTroCap();
			$t_thuong = $nv->tinhTienThuong();

			$t_linh = $luong + $t_cap + $t_thuong - $tp;
		}
		else{
			$luong = '';
			$t_cap = '';
			$t_thuong = '';
			$t_linh = '';
			$tp = '';
			$snv = '';
			$ssp = '';
		}
	 ?>
	 <form name="oop" action="" method="POST">
	 	<div class="grid-container-4">
	 		<div class="grid-item item1-5 text-center">
				<h3>QUẢN LÝ NHÂN VIÊN</h3>
			</div>
			<div class="grid-item item1-5"><hr></div>
		 	<div class="grid-item">Họ và tên:</div>
		 	<div class="grid-item">
		 		<input type="text" name="ten" required value="<?php echo (isset($_POST['submit'])?$nv->getHoTen():''); ?>">
		 	</div>
		 	<div class="grid-item">Số con:</div>
		 	<div class="grid-item half">
		 		<input type="number" name="soCon" required value="<?php echo (isset($_POST['submit'])?$nv->getSoCon():''); ?>">
		 	</div>

		 	<div class="grid-item">Ngày sinh:</div>
		 	<div class="grid-item">
		 		<input type="date" value="<?php echo(isset($_POST['submit']))?$nv->getNgaySinh():'' ?>" name="ngaySinh" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>
		 	<div class="grid-item">Ngày vào làm:</div>
		 	<div class="grid-item">
		 		<input type="date" value="<?php echo(isset($_POST['submit']))?$nv->getNgayVaoLam():'' ?>" name="ngayVaoLam" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>

		 	<div class="grid-item">Giới tính:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="gioiTinh" value="M" checked> Nam
		 		<input type="radio" name="gioiTinh" value="F"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['gioiTinh']=='F')?'checked':''; 
		 			?>
		 		> Nữ
		 	</div>
		 	<div class="grid-item">Hệ số lương:</div>
		 	<div class="grid-item half">
		 		<input type="number" name="heSoLuong" value="<?php echo(isset($_POST['submit']))?$nv->getHeSoLuong():'' ?>" required>
		 	</div>

		 	<div class="grid-item">Loại nhân viên:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="loaiNhanVien" value="VP" checked> Văn phòng
		 		<input type="radio" name="loaiNhanVien" value="SX"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['loaiNhanVien']=='SX')?'checked':''; 
		 			?>
		 		> Sản xuất
		 	</div>
		 	<div class="grid-item"></div>
		 	<div class="grid-item"></div>

		 	<div class="grid-item">Số ngày vắng:</div>
		 	<div class="grid-item half">
		 		<input type="number" id="VP" name="soNgayVang" value="<?php echo($snv) ?>" >
		 	</div>
		 	<div class="grid-item">Số sản phẩm:</div>
		 	<div class="grid-item half">
		 		<input type="number" id="SX" name="soSanPham" disabled
		 			value="<?php echo($ssp) ?>" 
		 		>
		 	</div>

		 	<div class="grid-item item1-5 text-center">
		 		<input type="submit" name="submit" value="Tính lương">
		 	</div>

			<div class="grid-item item1-5"><hr></div>

		 	<div class="grid-item">Tiền lương:</div>
		 	<div class="grid-item">
		 		<input type="text" name="tienLuong" value="<?php echo($luong) ?>" disabled>
		 	</div>
		 	<div class="grid-item">Trợ cấp:</div>
		 	<div class="grid-item">
		 		<input type="text" name="troCap" value="<?php echo($t_cap) ?>" disabled>
		 	</div>

		 	<div class="grid-item">Tiền thưởng:</div>
		 	<div class="grid-item">
		 		<input type="text" name="tienThuong" value="<?php echo($t_thuong) ?>" disabled>
		 	</div>
		 	<div class="grid-item">Tiền phạt:</div>
		 	<div class="grid-item">
		 		<input type="text" name="tienPhat" value="<?php echo($tp) ?>" disabled>
		 	</div>

		 	<div class="grid-item"></div>
		 	<div class="grid-item item2-3">
		 		<label for="thucLinh">Thực lĩnh:</label>
		 		<input class="quarter" type="text" name="thucLinh" value="<?php echo($t_linh) ?>" disabled>
		 	</div>
		 	<div class="grid-item"></div>
		 </div>
	 </form>

	 <script type="text/javascript">
	 	function toggleShow(array, show) {
	 		for(let i = 0; i < array.length; i++){
	 			array[i].hidden = show;
	 		}
	 	}
	 	
	 	var rad = document.oop.loaiNhanVien;
	    var prev = null;
	    if(rad[1].checked){
	    	document.getElementById('SX').disabled = false;
	        document.getElementById('VP').disabled = true;
	        document.getElementById('SX').required = true;
	        document.getElementById('VP').required = false;
	        document.getElementById('VP').value = '';
	    }

	    for(var i = 0; i < rad.length; i++) {
	        rad[i].onclick = function () {
	            if(this.value === 'SX'){
	            	document.getElementById('SX').disabled = false;
	            	document.getElementById('VP').disabled = true;
	            	document.getElementById('SX').required = true;
	        		document.getElementById('VP').required = false;
	        		document.getElementById('VP').value = '';
	            }
	            else{
	            	document.getElementById('SX').disabled = true;
	            	document.getElementById('VP').disabled = false;
	            	document.getElementById('SX').required = false;
	        		document.getElementById('VP').required = true;
	        		document.getElementById('SX').value = '';
	            }
	        };
	    }
	 </script>
</body>
</html>