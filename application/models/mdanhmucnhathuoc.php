<?php 
require_once ('database.php');
	class mdanhmucnhathuoc extends database
	{
        public function getdanhmucnhathuoc()
		{
			$conn = $this->connect();
			$stringPro="SELECT a.IDDanhMucNhaThuoc, a.TenDanhMucNhaThuoc, b.TenDanhMucTongQuat FROM `danhmucnhathuoc` a, `danhmuctongquat` b WHERE a.IDDanhMucTongQuat = b.IDDanhMucTongQuat AND a.IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getchitietdanhmucnhathuoc($iddanhmucnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="select * from danhmucnhathuoc where IDDanhMucNhaThuoc = $iddanhmucnhathuoc";
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

		public function getdanhmucnhathuocbydanhmuctongquat($iddanhmuctongquat)
		{
			$conn = $this->connect();
			$stringPro;
			if($iddanhmuctongquat){
				$stringPro="SELECT * FROM `danhmucnhathuoc` WHERE IDDanhMucTongQuat = ".$iddanhmuctongquat;
			}else{
				$stringPro="SELECT * FROM `danhmucnhathuoc`";
			}
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

		public function getdanhmucnhathuocbynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="SELECT * FROM `danhmucnhathuoc` WHERE IDNhaThuoc = $idnhathuoc";
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