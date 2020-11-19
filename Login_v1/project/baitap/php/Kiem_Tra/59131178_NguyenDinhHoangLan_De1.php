<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		require_once('class.sinhvien.php');
		require_once('class.giangvien.php');
		require_once('class.nhanvienvp.php');

		if(isset($_POST['submit'])){
			$fp = fopen("canbo.txt", "a+");
			$doi_tuong = $_POST['doi_tuong'];
			$ma_so = $_POST['ma_so'];
			$ho_ten = $_POST['ho_ten'];
			$gioi_tinh = $_POST['gioi_tinh'];
			$dia_chi = $_POST['dia_chi'];
			$nguoi;
			if(strcmp($doi_tuong, "GV") == 0){
				$hoc_vi = $_POST['hoc_vi'];
				$so_nam_ct = $_POST['so_nam_ct'];

				$nguoi = new GiangVien($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $hoc_vi, $so_nam_ct);
				$str = $nguoi->getMaSo().", ".$nguoi->getHoTen().", ".$nguoi->getGioiTinh().", ".$nguoi->getDiaChi().", ".$nguoi->getHocVi().", ".$nguoi->getSoNamCT().", ".$nguoi->tinhLuong()."\n";
			}
			else if(strcmp($doi_tuong, "SV") == 0){
				$lop = $_POST['lop'];
				$nganh = $_POST['nganh'];

				$nguoi = new SinhVien($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $lop, $nganh);
				$str = $nguoi->getMaSo().", ".$nguoi->getHoTen().", ".$nguoi->getGioiTinh().", ".$nguoi->getDiaChi().", ".$nguoi->getLop().", ".$nguoi->getNganhHoc().", ".$nguoi->tinhTienThuong()."\n";
			}
			else if(strcmp($doi_tuong, "NVVP") == 0){
				$phong_ban = $_POST['phong_ban'];

				$nguoi = new NhanVienVanPhong($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $phong_ban);
				$str = $nguoi->getMaSo().", ".$nguoi->getHoTen().", ".$nguoi->getGioiTinh().", ".$nguoi->getDiaChi().", ".$nguoi->getPhongBan().", ".$nguoi->tinhDiemThuong()."\n";
			}

			fwrite($fp, $str);
			fclose($fp);
		}
	 ?>
	 <form name="kt" action="" method="POST">
	 <h1 align="center">THÔNG TIN CÁN BỘ</h1>
	 <table style="border: 1px solid black; padding: 5px;" align="center">
	 	<tr>
	 		<td>Mã số:</td>
	 		<td><input type="text" name="ma_so" value="<?php echo(isset($_POST['submit'])?$nguoi->getMaSo():''); ?>" required></td>
	 		<td>Họ tên:</td>
	 		<td><input type="text" name="ho_ten" value="<?php echo(isset($_POST['submit'])?$nguoi->getHoTen():''); ?>" required></td>
	 	</tr>
	 	<tr>
	 		<td>Địa chỉ:</td>
	 		<td><input type="text" name="dia_chi" value="<?php echo(isset($_POST['submit'])?$nguoi->getDiaChi():''); ?>" required></td>
	 		<td>Giới tính:</td>
	 		<td>
	 			<input type="radio" name="gioi_tinh" value="1" checked> Nam
	 			<input type="radio" name="gioi_tinh" value="0" value="<?php echo(isset($_POST['submit'])?($nguoi->getGioiTinh()?'checked':''):''); ?>"> Nữ
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><hr></td>
	 	</tr>
	 	<tr>
	 		<td><b>Loại đối tượng: </b></td>
	 		<td colspan="3">
	 			<input type="radio" name="doi_tuong" value="SV" checked> Sinh viên
	 			<input type="radio" name="doi_tuong" value="GV"> Giảng viên
	 			<input type="radio" name="doi_tuong" value="NVVP"> Nhân viên văn phòng
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><hr></td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><b>Giảng viên: </b></td>
	 	</tr>
	 	<tr id="GV_1">
	 		<td>Học vị: </td>
	 		<td colspan="3">
	 			<input type="radio" name="hoc_vi" value="CUNHAN" checked> Cử nhân
	 			<input type="radio" name="hoc_vi" value="THACSI"> Thạc sĩ
	 			<input type="radio" name="hoc_vi" value="TIENSI"> Tiến sĩ
	 		</td>
	 	</tr>
	 	<tr id="GV_2">
	 		<td>Số năm công tác: </td>
	 		<td colspan="3">
	 			<input type="number" name="so_nam_ct">
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><hr></td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><b>Sinh viên: </b></td>
	 	</tr>
	 	<tr id="SV_1">
	 		<td>Lớp: </td>
	 		<td colspan="3">
	 			<input type="text" name="lop">
	 		</td>
	 	</tr>
	 	<tr id="SV_2">
	 		<td>Ngành: </td>
	 		<td colspan="3">
	 			<input type="radio" name="nganh" value="CNTT" checked> Công nghệ thông tin
	 			<input type="radio" name="nganh" value="XAYDUNG"> Xây dựng
	 			<input type="radio" name="nganh" value="KHAC"> Khác
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><hr></td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><b>Nhân viên văn phòng: </b></td>
	 	</tr>
	 	<tr id="NV">
	 		<td>Phòng ban: </td>
	 		<td colspan="3">
	 			<input type="radio" name="phong_ban" value="HANHCHINH" checked> Hành chính
	 			<input type="radio" name="phong_ban" value="KHAC"> Khác
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="4"><hr></td>
	 	</tr>
	 	<tr>
	 		<td colspan="3">
	 		</td>
	 		<td>
	 			<input type="submit" name="submit" value="Lưu cán bộ">
	 		</td>
	 	</tr>
	 </table>
	</form>
</body>
</html>