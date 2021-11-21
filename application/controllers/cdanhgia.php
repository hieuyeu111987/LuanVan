<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class cdanhgia extends cbase
{
    protected $danhgia;
	protected $nguoidung;
    function __construct() {
	   $this->danhgia = parent::setModel('mdanhgia', $this->danhgia);
	   $this->nguoidung = parent::setModel('mnguoidung', $this->nguoidung);
	}
	//Function using to get list data
	public function getdanhgia()
	{
		$data = $this->danhgia->getdanhgia();
        $routeView = new Route();
        $routeView->view('danhgia', 'danhgia_view', $data);
	}
	public function getdanhgiabysanpham($id = NULL)
	{
		$idsanpham;
		if($id == NULL){
			$idsanpham = $_GET["idsanpham"];
		}else{
			$idsanpham = $id;
		}
		$data = $this->danhgia->getdanhgiabysanpham($idsanpham);
		
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
        $routeView->view('danhgia', 'home_danhgia_view', $data);
	}
	public function doadddanhgiasanpham(){
		$IDSanPham = $_POST["idsanpham"];
		$IDNguoiDung = $_POST["idnguoidung"];
		$MoTa = $_POST["mota"];
		$SoSao = $_POST["sosao"];

		$datacot 	=		array('SoSao', 'MoTa', 'IDSanPham', 'IDNguoiDung');
		$datainsert =		array($SoSao, $MoTa, $IDSanPham, $IDNguoiDung);

		$rs = $this->danhgia->insert_base('danhgiasanpham',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm đánh giá sản phẩm thành công!!");
			$this->getdanhgiabysanpham($IDSanPham);
		}
		else{
			$this->phpAlert("Thêm giá sản phẩm thất bại do dữ liệu!!");
		}
	}
    public function dodeletedanhgia(){
		$IDdanhgia = $_GET["iddanhgia"];
		$rs = $this->danhgia->delete_base('danhgia',"IDdanhgia = ".$IDdanhgia);
		if($rs['status']){
			$this->phpAlert("Xóa công ty dược thành công!!");
			$this->getdanhgia();
		}
		else{
			$this->phpAlert("Xóa công ty dược thất bại do dữ liệu!!");
		}
	}
	public function xoadanhgia(){
		$iddanhgiasanpham = $_GET["iddanhgiasanpham"];
		$idsanpham = $_GET["idsanpham"];
		$rs = $this->danhgia->delete_base('danhgiasanpham',"IDDanhGiaSanPham = ".$iddanhgiasanpham);
		if($rs['status']){
			$this->phpAlert("Xóa đánh giá thành công!!");
			$this->getdanhgiabysanpham($idsanpham);
		}
		else{
			$this->phpAlert("Xóa đánh giá thất bại do dữ liệu!!");
		}
	}
}
?>