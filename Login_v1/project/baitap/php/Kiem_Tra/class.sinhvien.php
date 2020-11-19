<?php 
	require_once('class.nguoi.php');
	class SinhVien extends Nguoi
		    {
		    	private $lop;
		    	private $nganh_hoc;
		    	const tien_thuong_cb = 100000;

				public function __construct($ma_so, $ho_ten, $gioi_tinh, $dia_chi, $lop, $nganh_hoc)
				{
					$this->ma_so = $ma_so;
					$this->ho_ten = $ho_ten;
					$this->gioi_tinh = $gioi_tinh;
					$this->dia_chi = $dia_chi;
					$this->lop = $lop;
					$this->nganh_hoc = $nganh_hoc;
				}

				public function tinhTienThuong(){
					if($this->nganh_hoc == "CNTT")
						return self::tien_thuong_cb;
					elseif($this->nganh_hoc == "XAYDUNG")
						return self::tien_thuong_cb * 1.5;
					else
						return self::tien_thuong_cb * 1.25;
				}
		    
			    
			    public function getLop()
			    {
			        return $this->lop;
			    }

			    public function setLop($lop)
			    {
			        $this->lop = $lop;

			        return $this;
			    }

			    public function getNganhHoc()
			    {
			        return $this->nganh_hoc;
			    }

			    public function setNganhHoc($nganh_hoc)
			    {
			        $this->nganh_hoc = $nganh_hoc;

			        return $this;
			    }
			}
 ?>