<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>basic php</title>
        <link rel="stylesheet" href="../../css/grid.css">
    </head>
    <body>
        <style type="text/css">
        </style>
    
        <?php
        abstract class canbo_SV{
            protected $ma_so;
            protected $ho_ten;
            protected $gioi_tinh;
            protected $ngay_sinh;
            protected $don_vi_ct;

            abstract public function Tinh_Thuong();
            public function getMa_so()
            {   
                return $this->ma_so;
            }
            public function getHo_ten()
            {   
                return $this->ho_ten;
            }
            public function getGioi_tinh()
            {   
                return $this->gioi_tinh;
            }
            public function getNgay_sinh()
            {   
                return $this->ngay_sinh;
            }
            public function getDon_vi_ct()
            {   
                return $this->don_vi_ct;
            }

            public function setMa_so($ms)
            {   
                $this->ma_so = $ms;
            }
            public function setHo_ten($ht)
            {   
                $this->ho_ten = $ht;
            }
            public function setGioi_tinh($gt)
            {   
                $this->gioi_tinh = $gt;
            }
            public function setNgay_sinh($ns)
            {   
                $this->ngay_sinh = $ns;
            }
            public function setDon_vi_ct($dvct)
            {   
                $this->don_vi_ct = $dvct;
            }
        }

        class giangvien extends canbo_SV 
        {
            protected $ngay_ve_truong;
            protected $hoc_vi;
            protected $so_ctnc;
            public $don_gia_bai_bao = 3000000;

            public function setNgay_ve_truong($nvt)
            {   
                $this->ngay_ve_truong = $nvt;
            }
            public function setHoc_vi($hv)
            {   
                $this->hoc_vi = $hv;
            }
            public function setSo_ctnc($ctnc)
            {   
                $this->so_ctnc = $ctnc;
            }
            public function getSo_ctnc()
            {   
                return $this->so_ctnc;
            }
            public function getNgay_ve_truong()
            {   
                return $this->ngay_ve_truong;
            }
            public function getHoc_vi()
            {   
               return $this->hoc_vi;
            }

            public function Tinh_Thuong()
            {
                if(($this->hoc_vi == "Thac si" || $this->hoc_vi = "Tien si") && $this->so_ctnc <= 2)
                    return $this->don_gia_bai_bao * $this->so_ctnc;
                else
                {
                    if($this->hoc_vi = "Tien si" && $this->so_ctnc >= 3)
                        return $this->don_gia_bai_bao * $this->so_ctnc * 1.5;
                }
            }
        }

        class sinhvien extends canbo_SV
        {
            protected $lop;
            protected $nganh_hoc;
            protected $diem_tb;

            public function setLop($l)
            {   
                $this->lop = $l;
            }
            public function setNganh_hoc($nh)
            {   
                $this->nganh_hoc = $nh;
            }
            public function setDiem_tb($dtb)
            {   
                $this->diem_tb = $dtb;
            }
            public function getLop()
            {   
                return $this->lop;
            }
            public function getNganh_hoc()
            {   
                return $this->ngaanh_hoc;
            }
            public function getDiem_tb()
            {   
               return $this->diem_tb;
            }
            public function Tinh_Thuong()
            {
                if($this->diem_tb >= 8)
                {
                    if($this->gioi_tinh == "Nu")
                        return 1500000;
                    else 
                        return 1000000;
                }
                else
                    return 0;
            }
        }

        class chuyenvien extends canbo_SV
        {
            protected $chuc_vu;
            protected $so_sang_kien;

            public function setChuc_vu($cv)
            {   
                $this->chuc_vu = $cv;
            }
            public function setSo_sang_kien($ssk)
            {   
                $this->so_sang_kien = $ssk;
            }
            public function getChuc_vu()
            {   
                return $this->chuc_vu;
            }
            public function getSo_sang_kien()
            {   
                return $this->so_sang_kien;
            }
        
            public function Tinh_Thuong()
            {
                if($this->so_sang_kien > 0)
                {
                    if($this->chuc_vu == "Truong phong")
                        return $this->so_sang_kien * 2500000;
                    else {
                        if($this->chuc_vu == "Pho phong")
                            return $this->so_sang_kien * 2300000;
                        else {
                            if($this->chuc_vu == "Thu ky")
                                return $this->so_sang_kien * 2100000;
                            else 
                                return $this->so_sang_kien * 2000000;
                        }
                    }
                }
                else
                    return 0;
            }
        }

        class Loaicanbo
		{
			public static function create($Loaicb){
				switch ($Loaicb) {
					case "GV":
						return new giangvien();

					case "SV":
                        return new sinhvien();
                        
                    case "CV":
                        return new chuyenvien();
					
					default:
						return null;
				}
			}
        }
        
        if(isset($_POST['submit'])){
			$Loaicb = $_POST['Loaicb'];
            $cb = Loaicanbo::create($Loaicb);
			$cb->setMa_so($_POST['ma_so']);
			$cb->setHo_ten($_POST['ho_ten']);
			$cb->setGioi_tinh($_POST['gioi_tinh']);
			$cb->setNgay_sinh($_POST['ngay_sinh']);
			$cb->setDon_vi_ct($_POST['don_vi_ct']);

			if(strcmp($Loaicb, "GV") == 0){
                $ngay_ve_truong = $_POST['ngay_ve_truong'];
                $hoc_vi = $_POST['hoc_vi'];
                $so_ctnc = $_POST['so_ctnc'];
                $cb->setNgay_ve_truong($_POST['ngay_ve_truong']);
                $cb->setHoc_vi($_POST['hoc_vi']);
                $cb->setSo_ctnc($_POST['so_ctnc']);
				$tienthuong = $cb->Tinh_Thuong();
			}
			else{
                if(strcmp($Loaicb, "SV") == 0){
                    $lop = $_POST['lop'];
                    $nganh_hoc = $_POST['nganh_hoc'];
                    $diem_tb = $_POST['diem_tb'];
                    $cb->setLop($_POST['lop']);
                    $cb->setNganh_hoc($_POST['nganh_hoc']);
                    $cb->setDiem_tb($_POST['diem_tb']);
                    $tienthuong = $cb->Tinh_Thuong();
                }
                else
                {
                    $chuc_vu = $_POST['chuc_vu'];
                    $so_sang_kien = $_POST['so_sang_kien'];
                    $cb->setChuc_vu($_POST['chuc_vu']);
                    $cb->setSo_sang_kien($_POST['so_sang_kien']);
                    $tienthuong = $cb->Tinh_Thuong();
                }
			}
		}

        else{
            $ngay_ve_truong = '';
            $hoc_vi = '';
            $so_ctnc = '';
            $lop = '';
            $nganh_hoc = '';
            $diem_tb = '';
            $chuc_vu = '';
            $so_sang_kien = '';
            $tienthuong = 0;
        }
        
        if (isset($_POST['submit'])) 
        {
            if ($_POST['Loaicb'] == "GV") 
            {
                $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                .$_POST['don_vi_ct'].",".$_POST['ngay_ve_truong'].",".$_POST['hoc_vi'].",".$_POST['so_ctnc']."\n";
                $fp = fopen("giangvien.txt", "a");
                fwrite($fp, $str);
            }
   
            if ($_POST['Loaicb'] == "SV") 
            {
                  $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                  .$_POST['don_vi_ct'].",".$_POST['lop'].",".$_POST['nganh_hoc'].",".$_POST['diem_tb']."\n";
                  $fp = fopen("sinhvien.txt", "a");
                   fwrite($fp, $str);
            }
   
            if ($_POST['Loaicb'] == "CV") 
            {
                  $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                  .$_POST['don_vi_ct'].",".$_POST['chuc_vu'].",".$_POST['so_sang_kien']."\n";
                  $fp = fopen("chuyenvien.txt", "a");
                   fwrite($fp, $str);
            }
            fclose($fp);
        }
        ?>

        <form name="canbo" action="OOP3.php" method="POST">
	 	<div class="grid-container-4">
		 	<div class="grid-item">Ma so:</div>
		 	<div class="grid-item">
		 		<input type="text" name="ma_so" required value="<?php echo (isset($_POST['submit'])?$cb->getMa_so():''); ?>">
		 	</div>
		 	<div class="grid-item">Ho ten:</div>
		 	<div class="grid-item half">
		 		<input type="text" name="ho_ten" required value="<?php echo (isset($_POST['submit'])?$cb->getHo_ten():''); ?>">
		 	</div>

		 	<div class="grid-item">Ngày sinh:</div>
		 	<div class="grid-item">
		 		<input type="date" value="<?php echo(isset($_POST['submit']))?$cb->getNgay_sinh():'' ?>" name="ngay_sinh" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>
		 	<div class="grid-item">Don vi cong tac:</div>
		 	<div class="grid-item">
		 		<input type="text" value="<?php echo(isset($_POST['submit']))?$cb->getDon_vi_ct():'' ?>" name="don_vi_ct" max="<?php echo(date("yy-m-d")) ?>" required>
		 	</div>

		 	<div class="grid-item">Giới tính:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="gioi_tinh" value="Nam" checked> Nam
		 		<input type="radio" name="gioi_tinh" value="Nu"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['gioi_tinh']=='Nu')?'checked':''; 
		 			?>
		 		> Nữ
		 	</div>

		 	<div class="grid-item">Loại cán bộ:</div>
		 	<div class="grid-item">
		 		<input type="radio" name="Loaicb" value="GV" checked> Giảng viên
		 		<input type="radio" name="Loaicb" value="SV"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['Loaicb']=='SV')?'checked':''; 
		 			?>
		 		> Sinh viên
                 <input type="radio" name="Loaicb" value="CV"
		 			<?php 
		 				if(isset($_POST['submit']))
		 					echo ($_POST['Loaicb']=='CV')?'checked':''; 
		 			?>
		 		> Chuyên viên
		 	</div>
		 	<div class="grid-item GV">Ngày về trường (Giảng viên):</div>
		 	<div class="grid-item GV">
		 		<input type="date" value="<?php echo(isset($_POST['submit'])?$ngay_ve_truong:''); ?>" name="ngay_ve_truong" max="<?php echo(date("yy-m-d")) ?>">
		 	</div>

		 	<div class="grid-item GV">Số công trình nghiên cứu (Giảng viên):</div>
            <div class="grid-item GV">
                <input type="number" name="so_ctnc" value="<?php echo (isset($_POST['submit'])?$so_ctnc:''); ?>">
		 	</div>

            <div class="grid-item GV">Học vị (Giảng viên):</div>
            <div class="grid-item GV">
                <input type="text" name="hoc_vi" value="<?php echo (isset($_POST['submit'])?$hoc_vi:'');?>">
		 	</div>

            <div class="grid-item SV">Lớp (Sinh viên):</div>
            <div class="grid-item SV">
                <input type="text" name="lop" value="<?php echo (isset($_POST['submit'])?$lop:''); ?>">
		 	</div>

             <div class="grid-item SV">Ngành học (Sinh viên):</div>
            <div class="grid-item SV">
                <input type="text" name="nganh_hoc" value="<?php echo (isset($_POST['submit'])?$nganh_hoc:''); ?>">
		 	</div>

             <div class="grid-item SV">Điểm trung bình (Sinh viên):</div>
            <div class="grid-item SV">
                <input type="number" name="diem_tb" value="<?php echo (isset($_POST['submit'])?$diem_tb:''); ?>">
		 	</div>

             <div class="grid-item CV">Chức vụ (Chuyên viên):</div>
            <div class="grid-item CV">
                <input type="text" name="chuc_vu" value="<?php echo (isset($_POST['submit'])?$chuc_vu:''); ?>">
		 	</div>

             <div class="grid-item CV">Số sáng kiến (Chuyên viên):</div>
            <div class="grid-item CV">
                <input type="text" name="so_sang_kien" value="<?php echo (isset($_POST['submit'])?$so_sang_kien:''); ?>">
		 	</div>

		 	<div class="grid-item">Tiền thưởng:</div>
		 	<div class="grid-item">
		 		<input type="text" name="tienthuong" value="<?php echo $tienthuong; ?>">
		 	</div>

		 	<div class="grid-item item1-5 text-center">
		 		<input type="submit" name="submit" value="lưu">
		 	</div>
		 </div>
     </form>

     <p>source code php:</p>
	<textarea cols='60' rows='8' style="height:50vh;">
        abstract class canbo_SV{
            protected $ma_so;
            protected $ho_ten;
            protected $gioi_tinh;
            protected $ngay_sinh;
            protected $don_vi_ct;

            abstract public function Tinh_Thuong();
            public function getMa_so()
            {   
                return $this->ma_so;
            }
            public function getHo_ten()
            {   
                return $this->ho_ten;
            }
            public function getGioi_tinh()
            {   
                return $this->gioi_tinh;
            }
            public function getNgay_sinh()
            {   
                return $this->ngay_sinh;
            }
            public function getDon_vi_ct()
            {   
                return $this->don_vi_ct;
            }

            public function setMa_so($ms)
            {   
                $this->ma_so = $ms;
            }
            public function setHo_ten($ht)
            {   
                $this->ho_ten = $ht;
            }
            public function setGioi_tinh($gt)
            {   
                $this->gioi_tinh = $gt;
            }
            public function setNgay_sinh($ns)
            {   
                $this->ngay_sinh = $ns;
            }
            public function setDon_vi_ct($dvct)
            {   
                $this->don_vi_ct = $dvct;
            }
        }

        class giangvien extends canbo_SV 
        {
            protected $ngay_ve_truong;
            protected $hoc_vi;
            protected $so_ctnc;
            public $don_gia_bai_bao = 3000000;

            public function setNgay_ve_truong($nvt)
            {   
                $this->ngay_ve_truong = $nvt;
            }
            public function setHoc_vi($hv)
            {   
                $this->hoc_vi = $hv;
            }
            public function setSo_ctnc($ctnc)
            {   
                $this->so_ctnc = $ctnc;
            }
            public function getSo_ctnc()
            {   
                return $this->so_ctnc;
            }
            public function getNgay_ve_truong()
            {   
                return $this->ngay_ve_truong;
            }
            public function getHoc_vi()
            {   
               return $this->hoc_vi;
            }

            public function Tinh_Thuong()
            {
                if(($this->hoc_vi == "Thac si" || $this->hoc_vi = "Tien si") && $this->so_ctnc <= 2)
                    return $this->don_gia_bai_bao * $this->so_ctnc;
                else
                {
                    if($this->hoc_vi = "Tien si" && $this->so_ctnc >= 3)
                        return $this->don_gia_bai_bao * $this->so_ctnc * 1.5;
                }
            }
        }

        class sinhvien extends canbo_SV
        {
            protected $lop;
            protected $nganh_hoc;
            protected $diem_tb;

            public function setLop($l)
            {   
                $this->lop = $l;
            }
            public function setNganh_hoc($nh)
            {   
                $this->nganh_hoc = $nh;
            }
            public function setDiem_tb($dtb)
            {   
                $this->diem_tb = $dtb;
            }
            public function getLop()
            {   
                return $this->lop;
            }
            public function getNganh_hoc()
            {   
                return $this->ngaanh_hoc;
            }
            public function getDiem_tb()
            {   
               return $this->diem_tb;
            }
            public function Tinh_Thuong()
            {
                if($this->diem_tb >= 8)
                {
                    if($this->gioi_tinh == "Nu")
                        return 1500000;
                    else 
                        return 1000000;
                }
                else
                    return 0;
            }
        }

        class chuyenvien extends canbo_SV
        {
            protected $chuc_vu;
            protected $so_sang_kien;

            public function setChuc_vu($cv)
            {   
                $this->chuc_vu = $cv;
            }
            public function setSo_sang_kien($ssk)
            {   
                $this->so_sang_kien = $ssk;
            }
            public function getChuc_vu()
            {   
                return $this->chuc_vu;
            }
            public function getSo_sang_kien()
            {   
                return $this->so_sang_kien;
            }
        
            public function Tinh_Thuong()
            {
                if($this->so_sang_kien > 0)
                {
                    if($this->chuc_vu == "Truong phong")
                        return $this->so_sang_kien * 2500000;
                    else {
                        if($this->chuc_vu == "Pho phong")
                            return $this->so_sang_kien * 2300000;
                        else {
                            if($this->chuc_vu == "Thu ky")
                                return $this->so_sang_kien * 2100000;
                            else 
                                return $this->so_sang_kien * 2000000;
                        }
                    }
                }
                else
                    return 0;
            }
        }

        class Loaicanbo
		{
			public static function create($Loaicb){
				switch ($Loaicb) {
					case "GV":
						return new giangvien();

					case "SV":
                        return new sinhvien();
                        
                    case "CV":
                        return new chuyenvien();
					
					default:
						return null;
				}
			}
        }
        
        if(isset($_POST['submit'])){
			$Loaicb = $_POST['Loaicb'];
            $cb = Loaicanbo::create($Loaicb);
			$cb->setMa_so($_POST['ma_so']);
			$cb->setHo_ten($_POST['ho_ten']);
			$cb->setGioi_tinh($_POST['gioi_tinh']);
			$cb->setNgay_sinh($_POST['ngay_sinh']);
			$cb->setDon_vi_ct($_POST['don_vi_ct']);

			if(strcmp($Loaicb, "GV") == 0){
                $ngay_ve_truong = $_POST['ngay_ve_truong'];
                $hoc_vi = $_POST['hoc_vi'];
                $so_ctnc = $_POST['so_ctnc'];
                $cb->setNgay_ve_truong($_POST['ngay_ve_truong']);
                $cb->setHoc_vi($_POST['hoc_vi']);
                $cb->setSo_ctnc($_POST['so_ctnc']);
				$tienthuong = $cb->Tinh_Thuong();
			}
			else{
                if(strcmp($Loaicb, "SV") == 0){
                    $lop = $_POST['lop'];
                    $nganh_hoc = $_POST['nganh_hoc'];
                    $diem_tb = $_POST['diem_tb'];
                    $cb->setLop($_POST['lop']);
                    $cb->setNganh_hoc($_POST['nganh_hoc']);
                    $cb->setDiem_tb($_POST['diem_tb']);
                    $tienthuong = $cb->Tinh_Thuong();
                }
                else
                {
                    $chuc_vu = $_POST['chuc_vu'];
                    $so_sang_kien = $_POST['so_sang_kien'];
                    $cb->setChuc_vu($_POST['chuc_vu']);
                    $cb->setSo_sang_kien($_POST['so_sang_kien']);
                    $tienthuong = $cb->Tinh_Thuong();
                }
			}
		}

        else{
            $ngay_ve_truong = '';
            $hoc_vi = '';
            $so_ctnc = '';
            $lop = '';
            $nganh_hoc = '';
            $diem_tb = '';
            $chuc_vu = '';
            $so_sang_kien = '';
            $tienthuong = 0;
        }
        
        if (isset($_POST['submit'])) 
        {
            if ($_POST['Loaicb'] == "GV") 
            {
                $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                .$_POST['don_vi_ct'].",".$_POST['ngay_ve_truong'].",".$_POST['hoc_vi'].",".$_POST['so_ctnc']."\n";
                $fp = fopen("giangvien.txt", "a");
                fwrite($fp, $str);
            }
   
            if ($_POST['Loaicb'] == "SV") 
            {
                  $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                  .$_POST['don_vi_ct'].",".$_POST['lop'].",".$_POST['nganh_hoc'].",".$_POST['diem_tb']."\n";
                  $fp = fopen("sinhvien.txt", "a");
                   fwrite($fp, $str);
            }
   
            if ($_POST['Loaicb'] == "CV") 
            {
                  $str = $_POST['ma_so'].",".$_POST['ho_ten'].",".$_POST['gioi_tinh'].",".$_POST['ngay_sinh'].","
                  .$_POST['don_vi_ct'].",".$_POST['chuc_vu'].",".$_POST['so_sang_kien']."\n";
                  $fp = fopen("chuyenvien.txt", "a");
                   fwrite($fp, $str);
            }
            fclose($fp);
        }
	</textarea>

     <script>
        function disable(cb,st)
        {
            for(var i = 0; i < cb.length; i++)
                cb[i].hidden = st;
        }
        var rad = document.canbo.Loaicb;
        var GV = document.getElementsByClassName("GV");
        disable(GV,true);
        var SV = document.getElementsByClassName("SV");
        disable(SV,true);
        var CV = document.getElementsByClassName("CV");
        disable(CV,true);
        for(var i = 0; i < rad.length; i++)
        {
            rad[i].onclick= function()
            {
                if(this.value === 'GV')
                {
                    disable(GV,false);
                    disable(SV,true);
                    disable(CV,true);
                }
                else
                {
                    if(this.value === 'SV')
                    {
                        disable(GV,true);
                        disable(SV,false);
                        disable(CV,true);
                    }
                    else
                    {
                        disable(GV,true);
                        disable(SV,true);
                        disable(CV,false);
                    }
                }
            }        
        }
        
     </script>
    </body>
</html>