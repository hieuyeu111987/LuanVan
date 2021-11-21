<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class cnguoidung extends cbase
{
	protected $nguoidung;
    function __construct() {
	   $this->nguoidung = parent::setModel('mnguoidung', $this->nguoidung);
	}
    
	public function getnguoidung()
	{
		$data = $this->nguoidung->getnguoidung();
        $routeView = new Route();
        $routeView->view('nguoidung', 'nguoidung_view', $data);
	}

    public function getthongtinnguoidung()
	{
		$data = $this->nguoidung->getthongtinnguoidung();
        $routeView = new Route();
        $routeView->view('nguoidung', 'nguoidung_view', $data);
	}

	public function getdoimatkhau()
	{
		$data = $this->nguoidung->getthongtinnguoidung();
        $routeView = new Route();
        $routeView->view('nguoidung', 'nguoidung_doimatkhau_view', $data);
	}

	public function getnguoidungbysanpham($id = NULL)
	{
		$idsanpham;
		if($id == NULL){
			$idsanpham = $_GET["idsanpham"];
		}else{
			$idsanpham = $id;
		}
		$data = $this->nguoidung->getnguoidungbysanpham($idsanpham);
		
		for($i = 0; $i < count($data); $i++) {
			if(isset($data[$i]['IDNguoiDung'])){
				$thongtinnguoidung = $this->nguoidung->getnguoidungbyid($data[$i]['IDNguoiDung']);
				$data[$i]['TenNguoiDung'] = $thongtinnguoidung[0]['TenNguoiDung'];
				$data[$i]['AnhDaiDien'] = $thongtinnguoidung[0]['AnhDaiDien'];
			}else{
				$data[$i]['TenNguoiDung'] = NULL;
				$data[$i]['AnhDaiDien'] = NULL;
			}
		}
        $routeView = new Route();
        $routeView->view('nguoidung', 'home_nguoidung_view', $data);
	}
	public function doaddnguoidungsanpham(){
		$IDSanPham = $_POST["idsanpham"];
		$IDNguoiDung = $_POST["idnguoidung"];
		$MoTa = $_POST["mota"];
		$SoSao = $_POST["sosao"];

		$datacot 	=		array('SoSao', 'MoTa', 'IDSanPham', 'IDNguoiDung');
		$datainsert =		array($SoSao, $MoTa, $IDSanPham, $IDNguoiDung);

		$rs = $this->nguoidung->insert_base('nguoidungsanpham',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm đánh giá sản phẩm thành công!!");
			$this->getnguoidungbysanpham($IDSanPham);
		}
		else{
			$this->phpAlert("Thêm giá sản phẩm thất bại do dữ liệu!!");
		}
	}
    public function doeditnguoidung(){
		$tennguoidung = $_POST["input-tennguoidung"];
        $sdt = $_POST["input-sdt"];
        $cmnd = $_POST["input-cmnd"];
        $email = $_POST["input-email"];
        $chitietnguoidung = $this->nguoidung->getthongtinnguoidung();
		$idnguoidung = $chitietnguoidung[0]['IDNguoiDung'];

        $anhdaidien = "";
		if($_FILES['input-anhdaidien']['name'] == ""){
			$anhdaidien = $chitietnguoidung[0]['AnhDaiDien'];
		}else{
			$anhdaidien = $idnguoidung.'-'.$_FILES['input-anhdaidien']['name'];
			unlink('../public/image/account/'.$chitietnguoidung[0]['AnhDaiDien']);
			move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/account/' .$idnguoidung.'-'.$_FILES['input-anhdaidien']['name']);
		}
        
        $datacot 	=		array('TenNguoiDung', 'SDT', 'CMND', 'Email', 'AnhDaiDien');
		$datainsert =		array($tennguoidung, $sdt, $cmnd, $email, $anhdaidien);
		$rs = $this->nguoidung->update_base('nguoidung',$datacot,$datainsert,"IDNguoiDung = ".$idnguoidung);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin người dùng thành công!!");
		}
		else{
			$this->phpAlert("Sửa thông tin người dùng thất bại do dữ liệu!!");
		}
		header("Location: dashboard.php");
    }
	public function dodoimatkhau(){
		$idnguoidung = $_POST["idnguoidung"];
		$matkhaumoi = $_POST["matkhaumoi"];

		$datacot 	=		array('MatKhau');
		$datainsert =		array(md5($matkhaumoi));

		$rs = $this->nguoidung->update_base('nguoidung',$datacot,$datainsert, "IDNguoiDung = ".$idnguoidung);
		if($rs['status']){
			$this->phpAlert("Đổi mật khẩu thành công!!");
		}
		else{
			$this->phpAlert("Đổi mật khẩu thất bại do dữ liệu!!");
		}
	}
    public function dodeletenguoidung(){
		$IDnguoidung = $_GET["idnguoidung"];
		$rs = $this->nguoidung->delete_base('nguoidung',"IDnguoidung = ".$IDnguoidung);
		if($rs['status']){
			$this->phpAlert("Xóa công ty dược thành công!!");
			$this->getnguoidung();
		}
		else{
			$this->phpAlert("Xóa công ty dược thất bại do dữ liệu!!");
		}
	}
}
?>