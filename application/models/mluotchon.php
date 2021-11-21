<?php 
require_once ('database.php');
	class mluotchon extends database
	{
		public function getluotchon($idnguoidung, $idsanpham)
		{
			$conn = $this->connect();
			$stringPro="select * from luotchon where IDNguoiDung = $idnguoidung AND IDSanPham = $idsanpham";
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