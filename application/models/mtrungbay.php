<?php 
require_once ('database.php');
	class mtrungbay extends database
	{
        public function gettrungbay()
		{
			$conn = $this->connect();
			$stringPro="select * from trungbay";
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

		public function gettrungbaybynhathuoc($idnhathuoc)
		{
			$conn = $this->connect();
			$stringPro="select * from trungbay where IDNhaThuoc = $idnhathuoc ORDER BY `IDTrungBay` ASC";
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