<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/grid.css">
	<title>Sách</title>
</head>
<body>
	<?php
        class Sach
        {
            public $ma_sach;
            public $ten_sach;
            public $tac_gia;
            public $don_gia;
            public $the_loai;
        }

		$array = array();
		if(file_exists("sach.txt")){
			$fp = fopen("sach.txt", "r");
			while(($line = fgets($fp)) != false){
                    $arr = explode(",", trim($line));
                    if($arr[0]!="")
                    {
                        $sach = new Sach();
                        $sach->the_loai = $arr[0];
                        $sach->ma_sach = $arr[1];
                        $sach->ten_sach = $arr[2];
                        $sach->tac_gia = $arr[3];
                        $sach->don_gia = $arr[4];
                        $array[] = $sach;
                    }
				}
			fclose($fp);
		}

		if (isset($_POST['submit'])) {
			$ma_sach = $_POST['ma_sach'];
			$ten_sach = $_POST['ten_sach'];
			$tac_gia = $_POST['tac_gia'];
            $don_gia = $_POST['don_gia'];
            $the_loai = $_POST['the_loai'];
            $sach = new Sach();
            $sach->the_loai = $the_loai;
            $sach->ma_sach = $ma_sach;
            $sach->ten_sach = $ten_sach;
            $sach->tac_gia = $tac_gia;
            $sach->don_gia = $don_gia;
            $array[] = $sach;
			$str = "";
			foreach ($array as $val) {
				$str = $val->the_loai.",".$val->ma_sach.",".$val->ten_sach.",".$val->tac_gia.",".$val->don_gia."\n";
			}
			$fp = fopen("sach.txt", "a");
            fwrite($fp, $str);
            
		}
		else{
			$ma_sach = "";
			$ten_sach = "";
			$tac_gia = "";
			$don_gia = "";
			$the_loai = "";
		}
	 ?>
    
	<h1 align="center">HIEN THI THONG TIN SACH</h1>
	 <form action="Bai15.php" method="POST">
	 	<div >
            <select style="width: 200px; margin: auto;" name="timkiem">
                <option>khoa hoc</option>
                <option>van hoc</option>
            </select>
		 	<input type="submit" name="read" value="xem thông tin">
	 	</div>
	 	
	 	<fieldset style="width: 800px; margin: auto;">
	 		<legend>THONG TIN SÁCH</legend>
	 		<table align="center">
		 		<tbody>
		 			<tr>
		 				<td>Mã số Sách:</td>
		 				<td><input type="text" name="ma_sach" value="<?php echo($ma_sach) ?>"></td>
		 				<td>Tên sách:</td>
		 				<td><input type="text" name="ten_sach" value="<?php echo($ten_sach) ?>"></td>
		 			</tr>
                     <tr>
		 				<td>Tác giả:</td>
		 				<td><input type="text" name="tac_gia" value="<?php echo($tac_gia) ?>"></td>
		 				<td>Đơn giá:</td>
		 				<td><input type="number" name="don_gia" value="<?php echo($don_gia) ?>"></td>
		 			</tr>
		 			<tr style="text-align:center">
                     <td>Thể loại sách:</td>
                     <td>
                        <select style="width: 200px; margin: auto;" name="the_loai">
                            <option>khoa hoc</option>
                            <option>van hoc</option>
                        </select>
                    </td>
                    <td></td>
		 				<td><input type="submit" name="submit" value="thêm sách"></td>
		 			</tr>
		 		</tbody>
		 	</table>
	 	</fieldset>
     </form>
     <?php
            if(isset($_POST['read']))
            {
                $timkiem = array();
                $fp = fopen("sach.txt", "r");
                while(($line = fgets($fp)) != false){
                        $arr = explode(",", trim($line));
                        if($arr[0]!="")
                        {
                            $sach = new Sach();
                            $sach->the_loai = $arr[0];
                            $sach->ma_sach = $arr[1];
                            $sach->ten_sach = $arr[2];
                            $sach->tac_gia = $arr[3];
                            $sach->don_gia = $arr[4];
                            $timkiem[] = $sach;
                        }
                    }
                fclose($fp);
                echo "<h1>Thông tin sách thuộc thể loại ".$_POST['timkiem']."</h1>";
                foreach($timkiem as $val)
                {
                    if($val->the_loai == $_POST['timkiem'])
                    {
                        echo "<p>Mã sách: ".$val->ma_sach."</p>";
                        echo "<p>Tên sách: ".$val->ten_sach."</p>";
                        echo "<p>Tác giả: ".$val->tac_gia."</p>";
                        echo "<p>Đơn giá: ".$val->don_gia."</p>";
                        echo "<p>----------------------------------------------------------</p>";
                    }
                    
                }
            }
         ?>
         <p>source code php:</p>
        <textarea cols='60' rows='8' style="height:50vh;">
        class Sach
        {
            public $ma_sach;
            public $ten_sach;
            public $tac_gia;
            public $don_gia;
            public $the_loai;
        }

		$array = array();
		if(file_exists("sach.txt")){
			$fp = fopen("sach.txt", "r");
			while(($line = fgets($fp)) != false){
                    $arr = explode(",", trim($line));
                    if($arr[0]!="")
                    {
                        $sach = new Sach();
                        $sach->the_loai = $arr[0];
                        $sach->ma_sach = $arr[1];
                        $sach->ten_sach = $arr[2];
                        $sach->tac_gia = $arr[3];
                        $sach->don_gia = $arr[4];
                        $array[] = $sach;
                    }
				}
			fclose($fp);
		}

		if (isset($_POST['submit'])) {
			$ma_sach = $_POST['ma_sach'];
			$ten_sach = $_POST['ten_sach'];
			$tac_gia = $_POST['tac_gia'];
            $don_gia = $_POST['don_gia'];
            $the_loai = $_POST['the_loai'];
            $sach = new Sach();
            $sach->the_loai = $the_loai;
            $sach->ma_sach = $ma_sach;
            $sach->ten_sach = $ten_sach;
            $sach->tac_gia = $tac_gia;
            $sach->don_gia = $don_gia;
            $array[] = $sach;
			$str = "";
			foreach ($array as $val) {
				$str = $val->the_loai.",".$val->ma_sach.",".$val->ten_sach.",".$val->tac_gia.",".$val->don_gia."\n";
			}
			$fp = fopen("sach.txt", "a");
            fwrite($fp, $str);
            
		}
		else{
			$ma_sach = "";
			$ten_sach = "";
			$tac_gia = "";
			$don_gia = "";
			$the_loai = "";
		}
        </textarea>
</body>
</html>