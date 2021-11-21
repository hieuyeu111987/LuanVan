<?php 
require_once ('database.php');
	class mtintuc extends database
	{
        public function gettintuc()
		{
			$conn = $this->connect();
			$stringPro="select * from tintuc";
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

		public function getchitiettintuc($idtintuc)
		{
			$conn = $this->connect();
			$stringPro="select * from tintuc where IDTinTuc = $idtintuc";
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
		public function doitrangthai($idtintuc)
		{
			$id = (string)$idtintuc;
			$conn = $this->connect();
			$stringPro="UPDATE `tintuc` SET `TrangThai`=!`TrangThai` WHERE `IDTinTuc` = $id";
			// $result = mysqli_query($conn, $stringPro);
			$query = $conn->prepare($stringPro);
			$query->execute();
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
			$stringPro="select MAX(IDTinTuc) from tintuc";
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