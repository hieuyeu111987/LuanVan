<?php 
require_once ('database.php');
	class mhoadonxuat extends database
	{
        public function gethoadonxuat()
		{
			$conn = $this->connect();
			$stringPro="SELECT a.IDHoaDonXuatHang, a.TenNguoiMua, a.SDT, a.DiaChi, a.NgayDatHang FROM `hoadonxuathang` a, `chitiethoadonxuathang` b, `sanpham` c WHERE a.IDHoaDonXuatHang = b.IDHoaDonXuatHang AND b.IDSanPham = c.IDSanPham AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc']." GROUP BY a.IDHoaDonXuatHang ORDER BY a.IDHoaDonXuatHang";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			if ($result->num_rows>0) {
					while ($post=mysqli_fetch_assoc($result)) {
						$posts[]=$post;
					}
			} 
			$this->Closeconnect($conn);
			return $posts;
		}

		public function getchitiethoadonxuat($idhoadonxuat)
		{
			$conn = $this->connect();
			$stringPro="select * from hoadonxuathang where IDHoaDonXuatHang = $idhoadonxuat";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			if ($result->num_rows>0) {
					while ($post=mysqli_fetch_assoc($result)) {
						$posts[]=$post;
					}
			} 
			$this->Closeconnect($conn);
			return $posts;
		}

        public function getmaxhoadonxuat()
		{
			$conn = $this->connect();
			$stringPro="select MAX(IDHoaDonXuatHang) from `hoadonxuathang`";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			if ($result->num_rows>0) {
					while ($post=mysqli_fetch_assoc($result)) {
						$posts[]=$post;
					}
			} 
			$this->Closeconnect($conn);
			return $posts;
		}

		public function getiddonhanghoadonxuat()
		{
			$conn = $this->connect();
			$stringPro="SELECT b.IDHoaDonXuatHang FROM `chitiethoadonxuathang` a, `hoadonxuathang` b, `sanpham` c WHERE a.IDHoaDonXuatHang = b.IDHoaDonXuatHang AND a.IDSanPham = c.IDSanPham AND b.GiaoHang = FALSE AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc']." GROUP BY b.IDHoaDonXuatHang";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			if ($result->num_rows>0) {
					while ($post=mysqli_fetch_assoc($result)) {
						$posts[]=$post;
					}
			} 
			$this->Closeconnect($conn);
			return $posts;
		}

		public function getidhoadonxuat()
		{
			$conn = $this->connect();
			$stringPro="SELECT b.IDHoaDonXuatHang FROM `chitiethoadonxuathang` a, `hoadonxuathang` b, `sanpham` c WHERE a.IDHoaDonXuatHang = b.IDHoaDonXuatHang AND a.IDSanPham = c.IDSanPham AND b.GiaoHang = TRUE AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc']." GROUP BY b.IDHoaDonXuatHang";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			if ($result->num_rows>0) {
					while ($post=mysqli_fetch_assoc($result)) {
						$posts[]=$post;
					}
			} 
			$this->Closeconnect($conn);
			return $posts;
		}
    }

?>