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
		$rowsPerPage = 5;
		if (!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}

		$offset = ($_GET['page'] - 1) * $rowsPerPage;
		$sql = "SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, Trong_luong, Don_gia
			FROM sua s, hang_sua hs, loai_sua ls
			WHERE s.Ma_hang_sua = hs.Ma_hang_sua and s.Ma_loai_sua = ls.Ma_loai_sua
			LIMIT $offset, $rowsPerPage";
		$result = mysqli_query($conn, $sql);
		echo "<p align='center'><font size='5'> THÔNG TIN HÃNG SỮA</font></P>";
		echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
		echo '	<tr>
				<th width="50">Số TT</th>
				<th width="150">Tên sữa</th>
				<th width="100">Hãng sữa</th>
				<th width="150">Loại sữa</th>
				<th width="100">Trọng lượng</th>
				<th width="100">Đơn giá</th>
			</tr>';
		if(mysqli_num_rows($result)<>0){
		$stt=1;
			while($rows=mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$stt."</td>";
				echo "<td>".$rows[0]."</td>";
				echo "<td>".$rows[1]."</td>";
				echo "<td>".$rows[2]."</td>";
				echo "<td>".$rows[3]."</td>";
				echo "<td>".number_format($rows[4])." VNĐ</td>";
				echo "</tr>";
				$stt+=1;
			}
		}echo"</table>";

		$numRows = mysqli_num_rows($result);
		$maxPage = floor($numRows/$rowsPerPage + 1);
		echo "<p align='center'>";
		if($_GET['page'] > 1)
			echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Prev</a> ";
		for ($i=1 ; $i<=$maxPage ; $i++){  
			if ($i == $_GET['page']){
				echo '<b>'.$i.'</b> ';
			}
			else
				echo "<a href=" .$_SERVER['PHP_SELF']."?page=".$i.">".$i."</a> ";}
		if($_GET['page'] < $maxPage)
			echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a> ";
		echo "</p>";
	 ?>
</body>
</html>