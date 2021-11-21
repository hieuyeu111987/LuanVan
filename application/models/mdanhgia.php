<?php 
require_once ('database.php');
	class mdanhgia extends database
	{
        public function getdanhgia()
		{
			$conn = $this->connect();
			$stringPro="select * from danhgiasanpham";
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

		public function getdanhgiabysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from danhgiasanpham where IDSanPham = $idsanpham";
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

		public function gettrungbinhdanhgiabysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select COUNT(IDDanhGiaSanPham) AS SoLuotDanhGia, SUM(SoSao) AS TongSoSao from danhgiasanpham where IDSanPham = $idsanpham";
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