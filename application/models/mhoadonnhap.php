<?php 
require_once ('database.php');
	class mhoadonnhap extends database
	{
        public function gethoadonnhap()
		{
			$conn = $this->connect();
			$stringPro="select * from `hoadonnhaphang` where IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getchitiethoadonnhap($idhoadonnhap)
		{
			$conn = $this->connect();
			$stringPro="select * from hoadonnhaphang where IDHoaDonNhapHang = $idhoadonnhap";
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
    }

?>