<?php 
require_once ('database.php');
	class msanpham extends database
	{
		public function getsanphamtomanage()
		{
			$conn = $this->connect();
			$stringPro="select * from sanpham where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

        public function getsanphamtohome()
		{
			$conn = $this->connect();
			$stringPro="select * from sanpham";
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

		public function gettimkiemsanphamtohome($tukhoa)
		{
			$conn = $this->connect();
			$stringPro="SELECT a.IDSanPham, a.TenSanPham, a.Mota, a.IDHinhAnh, a.IDDanhMucNhaThuoc, a.IDNhaThuoc FROM `sanpham` a, `danhmucnhathuoc` b, `danhmuctongquat` c, `nhathuoc` d WHERE a.IDDanhMucNhaThuoc = b.IDDanhMucNhaThuoc AND b.IDDanhMucTongQuat = c.IDDanhMucTongQuat AND a.IDNhaThuoc = d.IDNhaThuoc AND (a.Mota LIKE '%$tukhoa%' OR a.TenSanPham LIKE '%$tukhoa%' OR b.TenDanhMucNhaThuoc LIKE '%$tukhoa%' OR c.TenDanhMucTongQuat LIKE '%$tukhoa%' OR d.TenNhaThuoc LIKE '%$tukhoa%' OR d.DiaChi LIKE '%$tukhoa%' OR d.SDT LIKE '%$tukhoa%' OR d.Email LIKE '%$tukhoa%' OR d.WebSite LIKE '%$tukhoa%') GROUP BY a.IDSanPham";
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

		public function gettimkiemsanphamtohomebydanhmuctongquat($iddanhmuctongquat)
		{
			$conn = $this->connect();
			$stringPro= "SELECT a.IDSanPham, a.TenSanPham, a.Mota, a.IDHinhAnh, a.IDDanhMucNhaThuoc, a.IDNhaThuoc FROM `sanpham` a, `danhmucnhathuoc` b, `danhmuctongquat` c WHERE a.IDDanhMucNhaThuoc = b.IDDanhMucNhaThuoc AND b.IDDanhMucTongQuat = c.IDDanhMucTongQuat AND c.IDDanhMucTongQuat = $iddanhmuctongquat GROUP BY a.IDSanPham";
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

		public function getsanphamtohomebynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="select * from sanpham where IDNhaThuoc = $idnhathuoc";
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

		public function getchitietsanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from sanpham where IDsanpham = $idsanpham";
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

		public function getmaxidsanphaminnhathuoc()
		{
			$conn = $this->connect();
			$stringPro="select MAX(IDSanPham) from sanpham where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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