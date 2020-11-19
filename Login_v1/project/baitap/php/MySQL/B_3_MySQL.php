<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM khach_hang";
		$result = mysqli_query($conn, $sql);
		echo "<p align='center'><font size='5'> THÔNG TIN KHÁCH HÀNG</font></P>";
		echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
		echo '	<tr>
				<th width="50">Mã KH</th>
				<th width="150">Tên khách hàng</th>
				<th width="100">Giới tính</th>
				<th width="250">Địa chỉ</th>
				<th width="100">Số điện thoại</th>
			</tr>';
		if(mysqli_num_rows($result)<>0){
			while($rows=mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$rows['Ma_khach_hang']."</td>";
				echo "<td>".$rows['Ten_khach_hang']."</td>";
				if($rows['Phai']=='1')
					echo "<td><img width='20'  src=\"images/M.png\"/></td>";
				else
					echo "<td><img width='20'  src=\"images/F.png\"/></td>";
				echo "<td>".$rows['Dia_chi']."</td>";
				echo "<td>".$rows['Dien_thoai']."</td>";
				echo "</tr>";
			}
		}echo"</table>";
	 ?>
</body>
</html>