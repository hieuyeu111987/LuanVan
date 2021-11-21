<?php 
require_once ('database.php');
	class myeuthich extends database
	{
        public function getyeuthich()
		{
			$conn = $this->connect();
			$stringPro="select * from yeuthich";
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

		public function getchitietyeuthich($idyeuthich)
		{
			$conn = $this->connect();
			$stringPro="select * from yeuthich where IDyeuthich = $idyeuthich";
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
		public function getluotthich($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select COUNT(IDYeuThich) from yeuthich where IDSanPham = $idsanpham";
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

		public function getluotthichtomanage()
		{
			$conn = $this->connect();
			$stringPro="SELECT COUNT(b.IDYeuThich) AS LuotThich FROM `sanpham` a, `yeuthich` b WHERE a.IDSanPham = b.IDSanPham AND a.IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getluotthichbynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="SELECT COUNT(b.IDYeuThich) AS LuotThich FROM `sanpham` a, `yeuthich` b WHERE a.IDSanPham = b.IDSanPham AND a.IDNhaThuoc = ".$idnhathuoc;
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

		public function kiemtrayeuthich($idsanpham, $idnguoidung)
		{
			$conn = $this->connect();
			$stringPro="select IDYeuThich from yeuthich where IDSanPham = $idsanpham AND IDNguoiDung = $idnguoidung";
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