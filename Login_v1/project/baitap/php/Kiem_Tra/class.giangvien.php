<?php 
	require_once('class.nguoi.php');
	class GiangVien extends Nguoi
		{
			private $hoc_vi;
			private $so_nam_ct;
			const luong_co_ban = 1350000;

			public function __construct($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $hoc_vi, $so_nam_ct)
			{
				$this->ma_so = $ma_so;
				$this->ho_ten = $ho_ten;
				$this->gioi_tinh = $gioi_tinh;
				$this->dia_chi = $dia_chi;
				$this->hoc_vi = $hoc_vi;
				$this->so_nam_ct = $so_nam_ct;
			}
		
		    public function getHocVi()
		    {
		        return $this->hoc_vi;
		    }

		    public function setHocVi($hoc_vi)
		    {
		        $this->hoc_vi = $hoc_vi;

		        return $this;
		    }

		    public function getSoNamCt()
		    {
		        return $this->so_nam_ct;
		    }

		    public function setSoNamCt($so_nam_ct)
		    {
		        $this->so_nam_ct = $so_nam_ct;

		        return $this;
		    }

		    public function tinhLuong(){
		    	if($this->hoc_vi == "CUNHAN")
		    		return self::luong_co_ban * 2.67;
		    	elseif($this->hoc_vi == "THACSI")
		    		return self::luong_co_ban * 3.66;
		    	elseif($this->hoc_vi == "TIENSI")
		    		return self::luong_co_ban * 4.3;
		    }
		}
 ?>