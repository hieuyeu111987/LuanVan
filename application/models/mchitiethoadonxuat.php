<?php 
require_once ('database.php');
	class mchitiethoadonxuat extends database
	{
        public function getchitiethoadonxuat($idhoadonxuathang)
		{
			$conn = $this->connect();
			$stringPro="select * from `chitiethoadonxuathang` where IDHoaDonXuatHang = ".$idhoadonxuathang;
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

		public function getchitietchitiethoadonxuat($idchitiethoadonxuathang)
		{
			$conn = $this->connect();
			$stringPro="select * from `chitiethoadonxuathang` where IDChiTietHoaDonXuatHang = $idchitiethoadonxuathang";
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
			$stringPro="select MAX(IDHoaDonxuatHang) from `hoadonxuathang` where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getsoluongxuatbysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select SUM(SoLuong) AS SoLuong from `chitiethoadonxuathang` where IDSanPham = $idsanpham";
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

		public function getsoluongxuatbynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="SELECT SUM(b.SoLuong) AS SoLuong FROM `sanpham` a, `chitiethoadonxuathang` b WHERE a.IDSanPham = b.IDSanPham AND a.IDNhaThuoc = $idnhathuoc";
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

		public function getchitiethoadonxuatbyhoadon($idhoadonxuat)
		{
			$conn = $this->connect();
			$stringPro="SELECT * FROM `chitiethoadonxuathang` WHERE IDHoaDonXuatHang = $idhoadonxuat";
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

		public function getchitiethoadonpaypalbyhoadon($idhoadonpaypal)
		{
			$conn = $this->connect();
			$stringPro="SELECT * FROM `chitiethoadonxuathang` WHERE IDHoaDonPayPal = '$idhoadonpaypal'";
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