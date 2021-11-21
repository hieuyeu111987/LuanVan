<?php 
require_once ('database.php');
	class mcongtyduoc extends database
	{
        public function getcongtyduoc()
		{
			$conn = $this->connect();
			$stringPro="select * from congtyduoc";
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

		public function getcongtyduoctohome()
		{
			$conn = $this->connect();
			$stringPro="select * from congtyduoc where HienThi = TRUE";
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

		public function getchitietcongtyduoc($idcongtyduoc)
		{
			$conn = $this->connect();
			$stringPro="select * from congtyduoc where IDCongTyDuoc = $idcongtyduoc";
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
			$stringPro="select MAX(IDCongTyDuoc) from congtyduoc";
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

		public function doitrangthai($idcongtyduoc)
		{
			$conn = $this->connect();
			$stringPro="UPDATE `congtyduoc` SET HienThi=!HienThi where IDCongTyDuoc = $idcongtyduoc";
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