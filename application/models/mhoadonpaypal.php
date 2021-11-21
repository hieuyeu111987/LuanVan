<?php 
require_once ('database.php');
	class mhoadonpaypal extends database
	{
        public function gethoadonpaypal()
		{
			$conn = $this->connect();
			$stringPro="SELECT * FROM `hoadonpaypal` a, `chitiethoadonxuathang` b, `sanpham` c WHERE a.IDHoaDonPayPal = b.IDHoaDonPayPal AND b.IDSanPham = c.IDSanPham AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getchitiethoadonpaypal($idhoadonpaypal)
		{
			$conn = $this->connect();
			$stringPro="select * from hoadonpaypal where IDHoaDonPayPal = '$idhoadonpaypal'";
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

		public function getiddonhanghoadonpaypal()
		{
			$conn = $this->connect();
			$stringPro="SELECT b.IDHoaDonPayPal FROM `chitiethoadonxuathang` a, `hoadonpaypal` b, `sanpham` c WHERE a.IDHoaDonPayPal = b.IDHoaDonPayPal AND a.IDSanPham = c.IDSanPham AND b.GiaoHang = FALSE AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc']." GROUP BY b.IDHoaDonPayPal";
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

		public function getidhoadonpaypal()
		{
			$conn = $this->connect();
			$stringPro="SELECT b.IDHoaDonPayPal FROM `chitiethoadonxuathang` a, `hoadonpaypal` b, `sanpham` c WHERE a.IDHoaDonPayPal = b.IDHoaDonPayPal AND a.IDSanPham = c.IDSanPham AND b.GiaoHang = TRUE AND c.IDNhaThuoc = ".$_SESSION['idnhathuoc']." GROUP BY b.IDHoaDonPayPal";
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
    }

?>