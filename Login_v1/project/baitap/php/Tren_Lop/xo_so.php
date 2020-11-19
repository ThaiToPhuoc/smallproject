<!DOCTYPE html>
<html>
<head>
	<title>
		Xổ số
	</title>
</head>
<body>

	<table border="1">
		<tr>
			<th colspan="4">
				Kết quả xổ số ngày
				<?php 
					$ngay = date('d/m/yy');
					echo "$ngay";
				 ?>
			</th>
		</tr>
		<?php
			function getMax($m){
				$sum = 0;
				for ($i=0; $i < $m; $i++) { 
					$sum += 9 * pow(10, $i);
				}

				return $sum;
			}

			function getArr($x, $y){
				$myArr = array();
				for ($i=0; $i < $x; $i++) { 
					$myArr[] = rand(1, getMax($y));
				}

				return $myArr;
			}
			$myNumber = strval(sprintf('%1$06d', rand(1, 999999)));
			$arr = 	array(
				rand(1, 99),
				rand(1, 999),
				getArr(3, 4),
				rand(1, 9999),
				getArr(7, 5),
				getArr(2, 5),
				rand(1, 99999),
				rand(1, 99999),
				rand(1, 999999)
			);
			
			for ($i=8; $i >= 0; $i--) { 
				echo "<tr>";
					if ($i != 0) {
						echo "<td>Giải $i</td><td>";
					}
					else {
						echo "<td>Giải đặc biệt</td><td>";
					}
					switch ($i) {
						case 3:
							print(sprintf('%1$05d', $arr[8 - $i][0]));
							for ($j=1; $j < 2; $j++) { 
								$temp = sprintf('<br>%1$05d', $arr[8 - $i][$j]);
								print($temp);
							}
							break;
						case 4:
							print(sprintf('%1$05d', $arr[8 - $i][0]));
							for ($j=1; $j < 7; $j++) { 
								$temp = sprintf('<br>%1$05d', $arr[8 - $i][$j]);
								print($temp);
							}
							break;
						case 6:
							print(sprintf('%1$04d', $arr[8 - $i][0]));
							for ($j=1; $j < 3; $j++) { 
								$temp = sprintf('<br>%1$04d', $arr[8 - $i][$j]);
								print($temp);
							}
							break;
						case 8:
							print(sprintf('%1$02d', $arr[8 - $i]));
							break;
						case 7:
							print(sprintf('%1$03d', $arr[8 - $i]));
							break;
						case 0:
							print(sprintf('%1$06d', $arr[8 - $i]));
							break;
						default:
							$temp = sprintf('%1$05d', $arr[8 - $i]);
							print($temp);
							break;
					}
				echo "</td></tr>";
			}
			print("<h2>".$myNumber."</h2>");
			echo "<h2> Bạn ";
			if ($myNumber == $arr[8]) {
				echo "trúng giải đặc biệt";
			}
			else {
				$myNumber = substr($myNumber, 1);
				if ($myNumber == $arr[7]) {
					echo "trúng giải nhất";
				}
				elseif ($myNumber == $arr[6]) {
					echo "trúng giải nhì";
				}
				elseif(in_array($myNumber, $arr[5])) {
					echo "trúng giải ba";
				}
				elseif (in_array($myNumber, $arr[4])) {
					echo "trúng giải tư";
				}
				else{
					$myNumber = substr($myNumber, 1);
					if ($myNumber == $arr[3]) {
						echo "trúng giải năm";
					}
					elseif (in_array($myNumber, $arr[2])) {
						echo "trúng giải sáu";
					}
					else {
						$myNumber = substr($myNumber, 1);
						if ($myNumber == $arr[1]) {
							echo "trúng giải bảy";
						}
						else{
							$myNumber = substr($myNumber, 1);
							if ($myNumber == $arr[0]) {
								echo "trúng giải tám";
							}
							else{
								echo "không trúng giải";
							}
						}
					}
				}
			}
			echo "</h2>";
		?>
	</table>

</body>
</html>