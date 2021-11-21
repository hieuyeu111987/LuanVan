<?php 
require_once ('database.php');
	class mnguoidung extends database
	{
		public function getnguoidung()
		{
			$conn = $this->connect();
			$stringPro="select * from nguoidung";
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

		public function getthongtinnguoidung()
		{
			$conn = $this->connect();
			$stringPro="select * from nguoidung where IDNguoiDung = ".$_SESSION['user_id'];
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

		public function getnguoidungbyid($idnguoidung)
		{
			$conn = $this->connect();
			$stringPro="select * from nguoidung where IDNguoiDung = $idnguoidung";
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