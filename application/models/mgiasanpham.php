<?php 
require_once ('database.php');
	class mgiasanpham extends database
	{
        public function getgiasanpham()
		{
			$conn = $this->connect();
			$stringPro="SELECT a.IDgiasanpham, a.Tengiasanpham, b.TenDanhMucTongQuat FROM `giasanpham` a, `danhmuctongquat` b WHERE a.IDDanhMucTongQuat = b.IDDanhMucTongQuat AND a.IDNhaThuoc = ".$_SESSION['idnhathuoc'];
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

		public function getgiasanphammoinhat($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from giasanpham where IDSanPham = $idsanpham order by NgayCapNhat DESC, IDGiaSanPham DESC LIMIT 1";
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

		public function getgiabysanpham($idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from giasanpham where IDSanPham = ".$idsanpham;
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