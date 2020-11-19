<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../../css/table.css">
	<link rel="stylesheet" href="../../css/grid.css">
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
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang WHERE '$mkh' = Ma_khach_hang";
		if(isset($_POST['submit'])){
			$ht = $_POST['ten'];
			$p = $_POST['phai'];
			$dc = $_POST['diachi'];
			$dt = $_POST['dienthoai'];
			$m = $_POST['mail'];

			$sql_u = 
			"UPDATE khach_hang 
			SET Ten_khach_hang = '$ht', Phai = $p, Dia_chi = '$dc', Dien_thoai = '$dt', Email = '$m'
			WHERE Ma_khach_hang = '$mkh'";
			$flag = mysqli_query($conn, $sql_u);

			if(!$flag){
				echo "<script>
					alert('Vui lòng kiểm tra lại thông tin');
				</script>";
			}
		}

		$result = mysqli_query($conn, $sql);
		$kh = mysqli_fetch_array($result);
	 ?>
	<form action="" method="POST" style="width: 100%; margin-top: 20px;">
		<table align="center" style="width: 30%;">
			<thead>
				<tr>
					<th colspan="2" align="center"><h3>Cập nhật thông tin khách hàng</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Mã khách hàng: </td>
					<td><input name="makh" type="text" value="<?php echo($kh['Ma_khach_hang']); ?>" readonly disabled></td>
				</tr>
				<tr>
					<td>Tên khách hàng: </td>
					<td><input name="ten" type="text" value="<?php echo($kh['Ten_khach_hang']); ?>" required></td>
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
					<td><input name="diachi" type="text" value="<?php echo($kh['Dia_chi']); ?>" required></td>
				</tr>
				<tr>
					<td>Điện thoại: </td>
					<td><input name="dienthoai" type="tel" value="<?php echo($kh['Dien_thoai']); ?>" required></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input name="mail" type="email" value="<?php echo($kh['Email']); ?>" required></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="cập nhật"></td>
				</tr>
				<tr>
					<td><a href="B_12_MySQL.php">Quay lại danh sách.</a></td>
				</tr>
			</tbody>
		</table>
	</form>

	<p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
		if(isset($_GET["MAKH"]))
			$mkh = $_GET["MAKH"];
		else
			$mkh = $_POST["makh"];
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang WHERE '$mkh' = Ma_khach_hang";
		if(isset($_POST['submit'])){
			$ht = $_POST['ten'];
			$p = $_POST['phai'];
			$dc = $_POST['diachi'];
			$dt = $_POST['dienthoai'];
			$m = $_POST['mail'];

			$sql_u = 
			"UPDATE khach_hang 
			SET Ten_khach_hang = '$ht', Phai = $p, Dia_chi = '$dc', Dien_thoai = '$dt', Email = '$m'
			WHERE Ma_khach_hang = '$mkh'";
			$flag = mysqli_query($conn, $sql_u);

			if(!$flag){
				echo "<script>
					alert('Vui lòng kiểm tra lại thông tin');
				</script>";
			}
		}

		$result = mysqli_query($conn, $sql);
		$kh = mysqli_fetch_array($result);
	</textarea>
</body>
</html>