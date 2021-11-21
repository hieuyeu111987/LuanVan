<?php 
require_once ('database.php');
	class mchitiethoadonnhap extends database
	{
        public function getchitiethoadonnhap($idhoadonnhaphang)
		{
			$conn = $this->connect();
			$stringPro="select * from `chitiethoadonnhaphang` where IDHoaDonNhapHang = ".$idhoadonnhaphang;
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

		public function getchitietchitiethoadonnhap($idchitiethoadonnhaphang)
		{
			$conn = $this->connect();
			$stringPro="select * from `chitiethoadonnhaphang` where IDChiTietHoaDonNhapHang = $idchitiethoadonnhaphang";
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

        public function getmaxhoadonnhap()
		{
			$conn = $this->connect();
			$stringPro="select MAX(IDHoaDonNhapHang) from `hoadonnhaphang` where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getsoluongnhapbysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select SUM(SoLuong) AS SoLuong from `chitiethoadonnhaphang` where IDSanPham = $idsanpham";
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

		public function getsoluongnhapbynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="SELECT SUM(b.SoLuong) AS SoLuong FROM `sanpham` a, `chitiethoadonnhaphang` b WHERE a.IDSanPham = b.IDSanPham AND a.IDNhaThuoc = $idnhathuoc";
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