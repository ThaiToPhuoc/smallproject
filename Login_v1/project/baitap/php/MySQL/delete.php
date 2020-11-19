<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<style>
		input[type=text], input[type=tel], input[type=email]{
			width: 100%;
		}

		tr, td{
			padding-bottom: 5px;
		}
	</style>
	<?php 
		if(isset($_GET["MAKH"]))
			$mkh = $_GET["MAKH"];
		else
			$mkh = $_POST["makh"];
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang WHERE '$mkh' = Ma_khach_hang";
		if(isset($_POST['submit'])){
			$sql_u = 
			"DELETE FROM khach_hang 
			WHERE Ma_khach_hang = '$mkh'";
			$flag = mysqli_query($conn, $sql_u);

			if($flag){
				echo "<script>
					alert('Đã xóa thành công!');
				</script>";
			}
		}

		if($result = mysqli_query($conn, $sql)){
			header("Location: B_12_MySQL.php");
		}
		else
			$kh = mysqli_fetch_array($result);
	 ?>
	<form action="" method="POST" style="width: 100%; margin-top: 20px;">
		<table align="center" style="width: 30%;">
			<thead>
				<tr>
					<th colspan="2" align="center"><h3>Xóa khách hàng</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Mã khách hàng: </td>
					<td><input name="makh" type="text" value="<?php echo($kh['Ma_khach_hang']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td>Tên khách hàng: </td>
					<td><input name="ten" type="text" value="<?php echo($kh['Ten_khach_hang']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td>Giới tính: </td>
					<td>
						<input name="phai" type="radio" value="1" <?php echo($kh['Phai']?"checked":""); ?>> Nam
						<input name="phai" type="radio" value="0" <?php echo(!$kh['Phai']?"checked":""); ?>> Nữ
					</td>
				</tr>
				<tr>
					<td>Địa chỉ: </td>
					<td><input name="diachi" type="text" value="<?php echo($kh['Dia_chi']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td>Điện thoại: </td>
					<td><input name="dienthoai" type="tel" value="<?php echo($kh['Dien_thoai']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input name="mail" type="email" value="<?php echo($kh['Email']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="xóa"></td>
				</tr>
				<tr>
					<td><a href="B_12_MySQL.php">Quay lại danh sách.</a></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>