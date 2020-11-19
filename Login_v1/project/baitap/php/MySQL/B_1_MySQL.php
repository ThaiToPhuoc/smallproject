<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/table.css">
</head>
<body>
	<?php 
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');mysqli_set_charset($conn,  'UTF8');
		$sql="SELECT * FROM hang_sua";
		$result = mysqli_query($conn, $sql);
		echo "<p align='center'><font size='5'> THÔNG TIN HÃNG SỮA</font></P>";
		echo "<table class='tb tb-collapse tb-even'>";
		echo '	<tr>
				<th>Mã HS</th>
				<th>Tên hãng sữa</th>
				<th>Địa chỉ</th>
				<th>Điện thoại</th>
				<th>Email</th>
			</tr>';
		if(mysqli_num_rows($result)<>0){
		$stt=1;
			while($rows=mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$rows['Ma_hang_sua']."</td>";
				echo "<td>".$rows['Ten_hang_sua']."</td>";
				echo "<td>".$rows['Dia_chi']."</td>";
				echo "<td>".$rows['Dien_thoai']."</td>";
				echo "<td>".$rows['Email']."</td>";
				echo "</tr>";
				$stt+=1;
			}
		}echo"</table>";
	 ?>
</body>
</html>