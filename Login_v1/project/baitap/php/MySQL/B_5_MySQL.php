<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php
		
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua');mysqli_set_charset($conn,  'UTF8');
		$rowsPerPage = 3;
		if (!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}

		$offset = ($_GET['page'] - 1) * $rowsPerPage;
		$sql = "SELECT Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, Trong_luong, Don_gia, Hinh
			FROM sua s, hang_sua hs, loai_sua ls
			WHERE s.Ma_hang_sua = hs.Ma_hang_sua and s.Ma_loai_sua = ls.Ma_loai_sua
			LIMIT ".$offset.', '.$rowsPerPage;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)<>0){
		echo "<div class=\"form f-column\">";
		echo "<p align='center'><font size='5'> THÔNG TIN CÁC SẢN PHẨM</font></p>";
		$stt=1;
			while($rows=mysqli_fetch_array($result)){
				echo "<div class=\"grid-container\">
						<div class=\"grid-item item-r1-4\">
							<img width='100' src='../../images/Hinh_sua/".$rows[5]."'/>
						</div>
						<div class=\"grid-item\"><h3>".$rows[0]."</h3></div>
						<div class=\"grid-item\">Nhà sản xuất: ".$rows[1]."</div>
						<div class=\"grid-item\">".$rows[2]." - ".$rows[3]." gr - ".number_format($rows[4])." VNĐ</div>
								</div>";
				$stt+=1;
			}
		}
		echo "</div>";

		$numRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sua"));
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