<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>basic php</title>
    </head>
    <body>
        <style type="text/css">
            body{
                font-family: Cambria;
                /*background: rgb(149,253,255);*/
                background: linear-gradient(0deg, rgba(149,253,255,1) 0%, rgba(255,255,255,1) 92%);
                height: 100vh;
            }

            form, .form{
                display: flex;
                justify-content: center;
                align-content: center;
                padding-top: 10%;
            }
            .grid-container-4{
                background-color: white;
                padding: 10px;
                display: grid;
                grid-template-columns: 130px 300px 130px 300px;
                
                vertical-align: middle;
                grid-gap: 10px 10px;
                border-radius: 5px;
                box-shadow: 4px 3px 8px 1px #969696;
                -webkit-box-shadow: 4px 3px 8px 1px #969696;
            }

            input[type=text], input[type=date], input[type=number], select, textarea, .submit{
                max-width: 100%;
                min-width: 100%;
                box-sizing: border-box;
                border-radius: 3px;
                border: 1px solid gray;
                padding: .375rem .75rem;
                font-weight: 400;
                font-size: 1rem;
            }

            .item2-3{
                grid-column: 2 / 4;
            }

            .item1-4{
                grid-column: 1 / 4;
            }

            .item1-5{
                grid-column: 1 / 5;
            }
                        
            .half{
                width: 50%;
            }
        </style>
    
        <?php
        abstract class NhanVien{
            public $HoTen;
            public $GioiTinh;
            public $NgaySinh;
            public $NgayVaoLam;
            public $HeSoLuong;
            public $SoCon;
            public $LuongCanBan;

            abstract public function Tinh_Tien_Luong();
            abstract public function Tinh_Tro_Cap();
            public function Tinh_Tien_Thuong()
            {
                $date = date_diff(new DateTime(), new DateTime($this->NgayVaoLam));
                $SoNam = (int)$date->format("%y");
                return $SoNam * 1000000;
            }
        }

        class NhanVienVanPhong extends NhanVien 
        {
            public $SoNgayVang;
            public $DinhMucVang = 3;
            public $DonGiaPhat = 100000;

            public function Tinh_Tien_Phat()
            {
                if($this->SoNgayVang > $this->DinhMucVang)
                    return $this->SoNgayVang * $this->DonGiaPhat;
                else
                    return 0;
            }

            public function Tinh_Tro_Cap()
            {
                if($this->GioiTinh == "Nu")
                    return 200000 * $this->SoCon * 1.5;
                else
                    return 200000 * $this->SoCon;
            }

            public function Tinh_Tien_Luong()
            {
                return $this->LuongCanBan * $this->HeSoLuong - $this->Tinh_Tien_Phat();
            }
        }

        

        class NhanVienSanXuat extends NhanVien
        {
            public $SoSanPham;
            public $DinhMucSanPham = 30;
            public $DonGiaSanPham = 100000;

            public function Tinh_Tien_Thuong()
            {
                if($this->SoSanPham > $this->DinhMucSanPham)
                    return ($this->SoSanPham - $this->DinhMucSanPham) * $this->DonGiaSanPham * 0.03;
                else
                    return 0;
            }

            public function Tinh_Tro_Cap()
            {
                return 120000 * $this->SoCon;
            }

            public function Tinh_Tien_Luong()
            {
                return ($this->SoSanPham * $this->DonGiaSanPham) + $this->tinh_Tien_Thuong();
            }
        }

        class LoaiNhanVien
		{
			public static function create($LoaiNV){
				switch ($LoaiNV) {
					case "VP":
						return new NhanVienVanPhong();

					case "SX":
						return new NhanVienSanXuat();
					
					default:
						return null;
				}
			}
        }
        
        if(isset($_POST['submit'])){
			$LoaiNV = $_POST['LoaiNV'];
			$nv = LoaiNhanVien::create($LoaiNV);
			$nv->HoTen = $_POST['ten'];
			$nv->SoCon = $_POST['soCon'];
			$nv->NgayVaoLam = $_POST['ngayVaoLam'];
			$nv->NgaySinh = $_POST['ngaySinh'];
			$nv->GioiTinh = $_POST['gioiTinh'];
			$nv->HeSoLuong = $_POST['heSoLuong'];

			if(strcmp($LoaiNV, "VP") == 0){
				$nv->SoNgayVang = $_POST['soNgayVang'];
				$tp = $nv->Tinh_Tien_Phat();
			}
			else{
				$nv->SoSanPham = $_POST['soSanPham'];
				$tp = 0;
			}

			$luong = $nv->Tinh_Tien_Luong();
			$t_cap = $nv->Tinh_Tro_Cap();
			$t_thuong = $nv->Tinh_Tien_Thuong();
			$t_linh = $luong + $t_cap + $t_thuong - $tp;
		}

        else{
			$luong = '';
			$t_cap = '';
			$t_thuong = '';
			$t_linh = '';
			$tp = '';
		}
        ?>

        <form name="oop" action="OOP1.php" method="POST">
	 	<div class="grid-container-4">
		 	<div class="grid-item">Họ và tên:</div>
		 	<div class="grid-item">
		 		<input type="text" name="ten" required value="<?php echo (isset($_POST['submit'])?$nv->HoTen:''); ?>">
		 	</div>
		 	<div class="grid-item">Số con:</div>
		 	<div class="grid-item half">
		 		<input type="number" name="soCon" required value="<?php echo (isset($_POST['submit'])?$nv->SoCon:''); ?>">
		 	</div>

		 	<div class="grid-item">Ngày sinh:</div>
		 	<div class="grid-item">
		 		<input type="date" value="<?php echo(isset($_POST['submit']))?$nv->NgaySinh:'' ?>" name="ngaySinh" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>
		 	<div class="grid-item">Ngày vào làm:</div>
		 	<div class="grid-item">
		 		<input type="date" value="<?php echo(isset($_POST['submit']))?$nv->NgayVaoLam:'' ?>" name="ngayVaoLam" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>

		 	<div class="grid-item">Giới tính:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="gioiTinh" value="Nam" checked> Nam
		 		<input type="radio" name="gioiTinh" value="Nu"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['gioiTinh']=='Nu')?'checked':''; 
		 			?>
		 		> Nữ
		 	</div>
		 	<div class="grid-item">Hệ số lương:</div>
		 	<div class="grid-item half">
		 		<input type="number" name="heSoLuong" required>
		 	</div>

		 	<div class="grid-item">Loại nhân viên:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="LoaiNV" value="VP" checked> Văn phòng
		 		<input type="radio" name="LoaiNV" value="SX"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['LoaiNV']=='SX')?'checked':''; 
		 			?>
		 		> Sản xuất
		 	</div>
		 	<div class="grid-item"></div>
		 	<div class="grid-item"></div>

		 	<div class="grid-item">Số ngày vắng:</div>
		 	<div class="grid-item half">
		 		<input type="number" id="VP" name="soNgayVang">
		 	</div>
		 	<div class="grid-item">Số sản phẩm:</div>
		 	<div class="grid-item half">
		 		<input type="number" id="SX" name="soSanPham" disabled>
		 	</div>

		 	<div class="grid-item item1-5 text-center">
		 		<input type="submit" name="submit" value="Tính lương">
		 	</div>

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
		 		<label for="thucLinh">Tổng số lương:</label>
		 		<input class="quarter" type="text" name="thucLinh" value="<?php echo($t_linh) ?>" disabled>
		 	</div>
		 	<div class="grid-item"></div>
		 </div>
	 </form>
	 
	 <p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		abstract class NhanVien{
            public $HoTen;
            public $GioiTinh;
            public $NgaySinh;
            public $NgayVaoLam;
            public $HeSoLuong;
            public $SoCon;
            public $LuongCanBan;

            abstract public function Tinh_Tien_Luong();
            abstract public function Tinh_Tro_Cap();
            public function Tinh_Tien_Thuong()
            {
                $date = date_diff(new DateTime(), new DateTime($this->NgayVaoLam));
                $SoNam = (int)$date->format("%y");
                return $SoNam * 1000000;
            }
        }

        class NhanVienVanPhong extends NhanVien 
        {
            public $SoNgayVang;
            public $DinhMucVang = 3;
            public $DonGiaPhat = 100000;

            public function Tinh_Tien_Phat()
            {
                if($this->SoNgayVang > $this->DinhMucVang)
                    return $this->SoNgayVang * $this->DonGiaPhat;
                else
                    return 0;
            }

            public function Tinh_Tro_Cap()
            {
                if($this->GioiTinh == "Nu")
                    return 200000 * $this->SoCon * 1.5;
                else
                    return 200000 * $this->SoCon;
            }

            public function Tinh_Tien_Luong()
            {
                return $this->LuongCanBan * $this->HeSoLuong - $this->Tinh_Tien_Phat();
            }
        }

        

        class NhanVienSanXuat extends NhanVien
        {
            public $SoSanPham;
            public $DinhMucSanPham = 30;
            public $DonGiaSanPham = 100000;

            public function Tinh_Tien_Thuong()
            {
                if($this->SoSanPham > $this->DinhMucSanPham)
                    return ($this->SoSanPham - $this->DinhMucSanPham) * $this->DonGiaSanPham * 0.03;
                else
                    return 0;
            }

            public function Tinh_Tro_Cap()
            {
                return 120000 * $this->SoCon;
            }

            public function Tinh_Tien_Luong()
            {
                return ($this->SoSanPham * $this->DonGiaSanPham) + $this->tinh_Tien_Thuong();
            }
        }

        class LoaiNhanVien
		{
			public static function create($LoaiNV){
				switch ($LoaiNV) {
					case "VP":
						return new NhanVienVanPhong();

					case "SX":
						return new NhanVienSanXuat();
					
					default:
						return null;
				}
			}
        }
        
        if(isset($_POST['submit'])){
			$LoaiNV = $_POST['LoaiNV'];
			$nv = LoaiNhanVien::create($LoaiNV);
			$nv->HoTen = $_POST['ten'];
			$nv->SoCon = $_POST['soCon'];
			$nv->NgayVaoLam = $_POST['ngayVaoLam'];
			$nv->NgaySinh = $_POST['ngaySinh'];
			$nv->GioiTinh = $_POST['gioiTinh'];
			$nv->HeSoLuong = $_POST['heSoLuong'];

			if(strcmp($LoaiNV, "VP") == 0){
				$nv->SoNgayVang = $_POST['soNgayVang'];
				$tp = $nv->Tinh_Tien_Phat();
			}
			else{
				$nv->SoSanPham = $_POST['soSanPham'];
				$tp = 0;
			}

			$luong = $nv->Tinh_Tien_Luong();
			$t_cap = $nv->Tinh_Tro_Cap();
			$t_thuong = $nv->Tinh_Tien_Thuong();
			$t_linh = $luong + $t_cap + $t_thuong - $tp;
		}

        else{
			$luong = '';
			$t_cap = '';
			$t_thuong = '';
			$t_linh = '';
			$tp = '';
		}
	</textarea>

     <script type="text/javascript">
	 	var rad = document.oop.LoaiNV;
	    var prev = null;
	    if(rad[1].checked){
	    	document.getElementById('SX').disabled = false;
	        document.getElementById('VP').disabled = true;
	    }

	    for(var i = 0; i < rad.length; i++) {
	        rad[i].onclick = function () {
	            if(this.value === 'SX'){
	            	document.getElementById('SX').disabled = false;
	            	document.getElementById('VP').disabled = true;
	            }
	            else{
	            	document.getElementById('SX').disabled = true;
	            	document.getElementById('VP').disabled = false;
	            }
	        };
	    }
	 </script>
    </body>
</html>