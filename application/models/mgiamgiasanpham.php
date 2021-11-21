<?php 
require_once ('database.php');
	class mgiamgiasanpham extends database
	{
        public function getgiamgiasanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from giamgiasanpham where IDSanPham = ".$idsanpham;
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

		public function getgiamgiahiemtai($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from giamgiasanpham where IDSanPham = $idsanpham AND NgayBatDau <= CURRENT_DATE AND NgayKetThuc >= CURRENT_DATE";
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

		public function getgiamgiabysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from giamgiasanpham where IDSanPham = ".$idsanpham;
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