<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang";
		$result = mysqli_query($conn, $sql);
		echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
		echo "<table align='center' width='1000' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
		echo '	<tr>
				<th width="75">Mã KH</th>
				<th width="250">Tên khách hàng</th>
				<th width="100">Giới tính</th>
				<th width="500">Địa chỉ</th>
				<th width="100">Số điện thoại</th>
				<th width="250">Email</th>
				<th width="50"><img src="../../images/edit.png"/></th>
				<th width="50"><img src="../../images/delete.png"/></th>
			</tr>';
		if(mysqli_num_rows($result)<>0){
			while($rows=mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$rows['Ma_khach_hang']."</td>";
				echo "<td>".$rows['Ten_khach_hang']."</td>";
				echo "<td>".($rows['Phai']?"Nam":"Nữ")."</td>";
				echo "<td>".$rows['Dia_chi']."</td>";
				echo "<td>".$rows['Dien_thoai']."</td>";
				echo "<td>".$rows['Email']."</td>";
				echo "<td><a href='edit.php?MAKH=".$rows["Ma_khach_hang"]."'>Sửa</a></td>";
				echo "<td><a href='delete.php?MAKH=".$rows["Ma_khach_hang"]."'>Xóa</a></td>";
				echo "</tr>";
			}
		}echo"</table>";
	 ?>

</body>
</html>