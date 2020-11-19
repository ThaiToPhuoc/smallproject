<!DOCTYPE html>
<html>
<head>
	<title>
		Bài tập PHP
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="javascript/sript.js"></script>
</head>
<body>
	<div>
		<h2>Bài tập cơ bản</h2>
		<div class="tab">
			<button class="tablinks" onclick="openTab(event, 'first')">Bài 1</button>
			<button class="tablinks" onclick="openTab(event, 'second')">Bài 2</button>
			<button class="tablinks" onclick="openTab(event, 'third')">Bài 3</button>
			<button class="tablinks" onclick="openTab(event, '')">Đóng</button>
		</div>

		<div id="first" class="tabcontent">
			<?php 
				$n = rand(1, 100);
				echo "Giá trị của n là $n. <br>";
				echo "Các số chẵn <= $n là";
				for ($i=1; $i < $n; $i++) { 
					if ($i % 2 == 0) {
						echo " $i";
					}
				}
				echo "<br> Bội số của 3 <= $n là";
				for ($i=1; $i < $n; $i++) { 
					if ($i % 3 == 0) {
						echo " $i";
					}
				}
			 ?>
		</div>

		<div id="second" class="tabcontent">
			<?php 
				echo "<br> Bảng cửu chương 2 => 10: <br>";
				for ($i=2; $i <= 10; $i++) { 
					echo "Bảng cửu chương $i: <br>";
					for ($j=1; $j <= 10; $j++) { 
						echo "$i x $j = ";
						print($i * $j);
						echo "<br>";
					}
					echo "<br>";
				}
			 ?>
		</div>

		<div id="third" class="tabcontent">
			<?php 
				$nt = rand(1, 1000);
				echo "Giá trị: $nt<br>";
				{
					$flag = false;
					for ($i = 2; $i < $nt - 1; $i++) { 
						if ($nt % $i == 0) {
							$flag = true;
							break;
						}
					}
					print($flag?"$nt không là số nguyên tố.":"$nt là số nguyên tố.");
				}
				{
					echo "<br>Tổng các số lẻ có 2 chữ số và nhỏ hơn $nt là: <br>";
					$sum = 0;
					if ($nt < 11) {
						echo "0";
					}
					else{
						echo "11";
						for ($i=13; $i < $nt; $i+=2) { 
							if ($i > 100) break;
							echo " + $i";
							$sum += $i;
						}
						echo "= $sum";
					}
				}
				{
					//--Cach 1--
					$length = 0;
					$temp = 1;
					while ($temp <= $nt) {
						$length++;
						$temp *= 10;
					}
					//--Cach 2--
					//echo strlen($nt);

					echo "<br>Số $nt có $length chữ số.";
				}
			 ?>
		</div>
	</div>
	
	<br>
	<hr>
	<h2>Bài tập về nhà</h2>
	<div class="tab">
		<button class="tablinks" onclick="openTab_n(event, 'fourth')">Bài 1</button>
		<button class="tablinks" onclick="openTab_n(event, 'fifth')">Bài 2</button>
		<button class="tablinks" onclick="openTab_n(event, '')">Đóng</button>
	</div>

	<div id="fourth" class="tabcontent_2">
		<?php 
			$n = rand(-50, 50);
			echo "Giá trị: $n<br>";
			if ($n < 0) {
				$n = abs($n);
			}

			$arr = array();
			for ($i=0; $i < $n; $i++) { 
				$array[] = rand(-100, 100);
			}
			//print_r($array);
			for ($i=0; $i < $n; $i++) { 
				echo "[$i] = $array[$i]<br>";
			}

			{
				$sum = 0;
				for ($i=1; $i <= $n; $i+=2) { 
					$sum += $i;
				}
				echo "Tổng các phần tử ở vị trí lẻ: $sum";
			}
		 ?>
	</div>

	<div id="fifth" class="tabcontent_2">
		<?php 
			$M = rand(2, 5);
			$N = rand(2, 5);
			$arr_2d = array();
			echo "Ma trận $M x $N<br>";
			for ($i=0; $i < $M; $i++) { 
				$arr_2d[] = array();
				for ($j=0; $j < $N; $j++) { 
					$arr_2d[$i][] = rand(-100, 100);
				}
			}

			for ($row = 0; $row < $M; $row++) {
				echo "[$row] => {";
			  	for ($col = 0; $col < $N; $col++) {
			    	print("&nbsp;&nbsp;".$arr_2d[$row][$col]);
			    	if ($col != $N - 1)
			    		echo ", ";
			  	}
			  	echo "&nbsp;&nbsp;}<br>";
			}

			for ($row = 0; $row < $M; $row++) {
			  	for ($col = 0; $col < $N; $col++) {
			  		if ($arr_2d[$row][$col] < 0) {
			  			$arr_2d[$row][$col] = 0;
			  		}
			  	}
			}

			echo "Ma trận sau khi đổi các phần tử âm thành 0:<br>";
			for ($row = 0; $row < $M; $row++) {
				echo "[$row] => {";
			  	for ($col = 0; $col < $N; $col++) {
			    	print("&nbsp;&nbsp;".$arr_2d[$row][$col]);
			    	if ($col != $N - 1)
			    		echo ", ";
			  	}
			  	echo "&nbsp;&nbsp;}<br>";
			}
		 ?>
	</div>
</body>
</html>