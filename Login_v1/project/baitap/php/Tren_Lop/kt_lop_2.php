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
		class Sach
		{
			private $ma_sach;
			private $ten_sach;
			private $tac_gia;
			private $don_gia;
			private $the_loai;
		
		    public function getMaSach()
		    {
		        return $this->ma_sach;
		    }

		    public function setMaSach($ma_sach)
		    {
		        $this->ma_sach = $ma_sach;

		        return $this;
		    }

		    public function getTenSach()
		    {
		        return $this->ten_sach;
		    }

		    public function setTenSach($ten_sach)
		    {
		        $this->ten_sach = $ten_sach;

		        return $this;
		    }

		    public function getTacGia()
		    {
		        return $this->tac_gia;
		    }

		    public function setTacGia($tac_gia)
		    {
		        $this->tac_gia = $tac_gia;

		        return $this;
		    }

		    public function getDonGia()
		    {
		        return $this->don_gia;
		    }

		    public function setDonGia($don_gia)
		    {
		        $this->don_gia = $don_gia;

		        return $this;
		    }

		    public function getTheLoai()
		    {
		        return $this->the_loai;
		    }

		    public function setTheLoai($the_loai)
		    {
		        $this->the_loai = $the_loai;

		        return $this;
		    }
		}

		function saveToFile(Sach $sach){
			$fp = fopen("sach.txt", "a");
			$str = $sach->getMaSach().",".$sach->getTenSach().",".$sach->getTacGia().",".$sach->getDonGia().",".$sach->getTheLoai()."\n";
			fwrite($fp, $str);
			fclose($fp);
		}

		function readFromFile(){
			$fp = fopen("sach.txt", "r");
			$book_array = array();
			while(($line = fgets($fp)) != false){
				if(!empty($line)){
					$array = explode(",", $line);
					$book = new Sach();
					$book->setMaSach($array[0]);
					$book->setTenSach($array[1]);
					$book->setTacGia($array[2]);
					$book->setDonGia($array[3]);
					$book->setTheLoai($array[4]);

					$book_array[] = $book;
				}
			}

			return $book_array;
		}

		if (isset($_POST['submit']) && !empty($_POST['ma_sach']) && !empty($_POST['ten_sach']) && !empty($_POST['tac_gia']) && !empty($_POST['don_gia'])) {
			$book = new Sach();
			$book->setMaSach($_POST['ma_sach']);
			$book->setTenSach($_POST['ten_sach']);
			$book->setTacGia($_POST['tac_gia']);
			$book->setDonGia($_POST['don_gia']);
			$book->setTheLoai($_POST['the_loai']);

			saveToFile($book);
		}
	 ?>

	 <form action="" method="POST">
	 	<table align="center">
	 		<tr>
	 			<td>Mã sách:</td>
	 			<td><input type="text" name="ma_sach"></td>
	 		</tr>
	 		<tr>
	 			<td>Tên sách:</td>
	 			<td><input type="text" name="ten_sach"></td>
	 		</tr>
	 		<tr>
	 			<td>Tác giả:</td>
	 			<td><input type="text" name="tac_gia"></td>
	 		</tr>
	 		<tr>
	 			<td>Đơn giá:</td>
	 			<td><input type="number" name="don_gia" min="0" step="1000"></td>
	 		</tr>
	 		<tr>
	 			<td>Thể loại:</td>
	 			<td>
	 				<select name="the_loai">
	 					<option value="THIEUNHI" selected>Truyện tranh thiếu nhi</option>
	 					<option value="TIEUTHUYET">Truyện tiểu thuyết</option>
	 					<option value="TRINHTHAM">Truyện trinh thám</option>
	 				</select>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td></td>
	 			<td>
	 				<input type="submit" name="submit" value="Thêm sách">
	 				<input type="submit" name="read" value="Xem sách">
	 			</td>
	 		</tr>
	 		<tr>
	 			<td colspan="2">
	 				<ul>
			 		<?php 
			 			if(isset($_POST['read'])){
			 				$b_array = readFromFile();
			 				foreach ($b_array as $book){
			 					echo "<li>".$book->getMaSach()."</li>";
								echo "<li>".$book->getTenSach()."</li>";
								echo "<li>".$book->getTacGia()."</li>";
								echo "<li>".$book->getDonGia()."</li>";
								echo "<li>".$book->getTheLoai()."</li>";
			 				}
			 			}
			 		 ?>
			 		</ul>
			 	</td>
			 </tr>
	 	</table>
	 </form>
</body>
</html>