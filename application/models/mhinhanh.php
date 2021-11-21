<?php 
require_once ('database.php');
	class mhinhanh extends database
	{
        public function gethinhanh()
		{
			$conn = $this->connect();
			$stringPro="select * from hinhanh where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getchitiethinhanh($idhinhanh)
		{
			$conn = $this->connect();
			$stringPro="select * from hinhanh where IDHinhAnh = $idhinhanh";
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
		public function getmaxid()
		{
			$conn = $this->connect();
			$stringPro="select MAX(IDHinhAnh) from hinhanh";
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