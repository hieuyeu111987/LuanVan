<?php 
require_once ('database.php');
	class mnhathuoc extends database
	{
        public function getnhathuoc()
		{
			$conn = $this->connect();
			$stringPro="select * from nhathuoc";
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

		public function getchitietnhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="select * from nhathuoc where IDNhaThuoc = $idnhathuoc";
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

		public function getthongtinnhathuoctomanage()
		{
			$conn = $this->connect();
			$stringPro="select * from nhathuoc where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function doitrangthai($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="UPDATE `nhathuoc` SET TrangThai=!TrangThai where IDNhaThuoc = $idnhathuoc";
			$result = mysqli_query($conn, $stringPro);
			$posts=array();
			// if ($result->num_rows>0) {
			// 		while ($post=mysqli_fetch_assoc($result)) {
			// 			$posts[]=$post;
			// 		}
			// } 
			$this->Closeconnect($conn);
			return $posts;
		}

		public function getmaxid()
		{
			$conn = $this->connect();
			$stringPro="select MAX(IDNhaThuoc) from nhathuoc";
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