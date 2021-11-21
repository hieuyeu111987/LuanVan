<?php 
require_once ('database.php');
	class mdanhmuctongquat extends database
	{
        public function getdanhmuctongquat()
		{
			$conn = $this->connect();
			$stringPro="select * from danhmuctongquat";
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

		public function getchitietdanhmuctongquat($iddanhmuctongquat)
		{
			$conn = $this->connect();
			$stringPro="select * from danhmuctongquat where IDdanhmuctongquat = $iddanhmuctongquat";
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
		public function doitrangthai($iddanhmuctongquat)
		{
			$conn = $this->connect();
			$stringPro="UPDATE `danhmuctongquat` SET TrangThai=!TrangThai where IDdanhmuctongquat = $iddanhmuctongquat";
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
    }

?>