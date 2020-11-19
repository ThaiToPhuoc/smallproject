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
		$conn= mysqli_connect('localhost', 'root', '', 'qlbansua1');
		$rowsPerPage = 2;
		if (!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}

		$offset = ($_GET['page'] - 1) * $rowsPerPage;
		$sql = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, Hinh
			FROM sua
			LIMIT ".$offset.', '.$rowsPerPage;
		$result = mysqli_query($conn, $sql);
	 ?>
	 <div class="form f-column">
	 	<?php 
	 		while ($item = mysqli_fetch_row($result)) {
	 			echo
				'<div class="grid-container chungus">
	 		 		<div class="grid-item item1-3 text-center b-border">
	 		 			<h2>'.$item[0].'</h2>
	 		 		</div>
	 		 		<div class="grid-item text-center r-border">
	 		 			<img src="../images/Hinh_sua/'.$item[5].'">
	 		 		</div>
	 		 		<div class="grid-item">
	 		 			<b>Thành phần dinh dưỡng: </b>
	 		 			<p>'.$item[1].'</p><br>
	 		 			<b>Lợi ích</b>
	 		 			<p>'.$item[2].'</p><br>
	 		 			<p align="right">
	 		 				<b>Trọng lượng: </b>'.$item[3].' gr - <b>Đơn giá: </b>'.number_format($item[4]) .' VNĐ
	 		 			</p>
	 		 		</div>
	 		 	</div>';
	 		}

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
	 </div>

	 <p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
			while ($item = mysqli_fetch_row($result)) {
	 			echo
				'<div class="grid-container chungus">
	 		 		<div class="grid-item item1-3 text-center b-border">
	 		 			<h2>'.$item[0].'</h2>
	 		 		</div>
	 		 		<div class="grid-item text-center r-border">
	 		 			<img src="../images/Hinh_sua/'.$item[5].'">
	 		 		</div>
	 		 		<div class="grid-item">
	 		 			<b>Thành phần dinh dưỡng: </b>
	 		 			<p>'.$item[1].'</p><br>
	 		 			<b>Lợi ích</b>
	 		 			<p>'.$item[2].'</p><br>
	 		 			<p align="right">
	 		 				<b>Trọng lượng: </b>'.$item[3].' gr - <b>Đơn giá: </b>'.number_format($item[4]) .' VNĐ
	 		 			</p>
	 		 		</div>
	 		 	</div>';
	 		}

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
	</textarea>
</body>
</html>