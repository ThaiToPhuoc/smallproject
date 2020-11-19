<?php 
	require_once('class.nguoi.php');
	class NhanVienVanPhong extends Nguoi
		{
			private $phong_ban;

			public function __construct($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $phong_ban)
			{
				$this->ma_so = $ma_so;
				$this->ho_ten = $ho_ten;
				$this->gioi_tinh = $gioi_tinh;
				$this->dia_chi = $dia_chi;
				$this->phong_ban = $phong_ban;
			}

		    public function getPhongBan()
		    {
		        return $this->phong_ban;
		    }

		    public function setPhongBan($phong_ban)
		    {
		        $this->phong_ban = $phong_ban;

		        return $this;
		    }

		    public function tinhDiemThuong(){
		    	if($this->phong_ban == "HANHCHINH")
		    		return 1;
		    	else
		    		return 2;
		    }
		}
 ?>