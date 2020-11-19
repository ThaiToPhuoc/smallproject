<?php 
	abstract class Nguoi
		{
			protected $ma_so;
			protected $ho_ten;
			protected $gioi_tinh;
			protected $dia_chi;

		    public function getMaSo()
		    {
		        return $this->ma_so;
		    }

		    public function setMaSo($ma_so)
		    {
		        $this->ma_so = $ma_so;

		        return $this;
		    }

		    public function getHoTen()
		    {
		        return $this->ho_ten;
		    }

		    public function setHoTen($ho_ten)
		    {
		        $this->ho_ten = $ho_ten;

		        return $this;
		    }

		    public function getGioiTinh()
		    {
		        return $this->gioi_tinh;
		    }

		    public function setGioiTinh($gioi_tinh)
		    {
		        $this->gioi_tinh = $gioi_tinh;

		        return $this;
		    }

		    public function getDiaChi()
		    {
		        return $this->dia_chi;
		    }

		    public function setDiaChi($dia_chi)
		    {
		        $this->dia_chi = $dia_chi;

		        return $this;
		    }
		}
 ?>