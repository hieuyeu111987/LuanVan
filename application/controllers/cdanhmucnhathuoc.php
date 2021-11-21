<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class cdanhmucnhathuoc extends cbase
{
    protected $danhmucnhathuoc;
	protected $danhmuctongquat;
    function __construct() {
	   $this->danhmucnhathuoc = parent::setModel('mdanhmucnhathuoc', $this->danhmucnhathuoc);
	   $this->danhmuctongquat = parent::setModel('mdanhmuctongquat', $this->danhmuctongquat);
	}
	//Function using to get list data
	public function getdanhmucnhathuoc()
	{
		$data = $this->danhmucnhathuoc->getdanhmucnhathuoc();
        $routeView = new Route();
        $routeView->view('danhmucnhathuoc', 'danhmucnhathuoc_view', $data);
	}
    public function getchitietdanhmucnhathuoc()
	{
		$danhmuctongquat = $this->danhmuctongquat->getdanhmuctongquat();
		$iddanhmucnhathuoc = $_GET["iddanhmuc"];
		$chitietdanhmucnhathuoc = $this->danhmucnhathuoc->getchitietdanhmucnhathuoc($iddanhmucnhathuoc);
		$data =		array("DanhMucTongQuat"=>$danhmuctongquat, "DanhMucNhaThuoc"=>$chitietdanhmucnhathuoc);
        $routeView = new Route();
        $routeView->view('danhmucnhathuoc', 'danhmucnhathuoc_edit', $data);
	}
	public function adddanhmucnhathuoc(){
		$data = $this->danhmuctongquat->getdanhmuctongquat();
		$routeView = new Route();
		$routeView->view('danhmucnhathuoc', 'danhmucnhathuoc_add', $data);
    }
    public function editdanhmucnhathuoc(){
        $s = $_SERVER['REQUEST_URI'];
        $vitritendanhmucnhathuoc = strrpos($s,"=");
        $danhmucnhathuoc = substr($s, $vitritendanhmucnhathuoc + 1);
		$tendanhmucnhathuoc = $this->asc2($danhmucnhathuoc);
		$routeView = new Route();
		$routeView->view('danhmucnhathuoc', 'danhmucnhathuoc_edit', $tendanhmucnhathuoc);
    }
	public function doadddanhmucnhathuoc(){
		$tendanhmucnhathuoc = $_POST["tendanhmucnhathuoc"];
		$iddanhmuctongquat = $_POST["iddanhmuctongquat"];
		$idnhathuoc = $_SESSION['idnhathuoc'];
        $datacot 	=		array('TenDanhMucNhaThuoc', 'IDDanhMucTongQuat', 'IDNhaThuoc');
		$datainsert =		array($tendanhmucnhathuoc, $iddanhmuctongquat, $idnhathuoc);
		$rs = $this->danhmucnhathuoc->insert_base('danhmucnhathuoc',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm danh mục thành công!!");
			$this->getdanhmucnhathuoc();
		}
		else{
			$this->phpAlert("Thêm danh mục thất bại do dữ liệu!!");
		}
    }
    public function doeditdanhmucnhathuoc(){
        $iddanhmuc = $_POST["iddanhmuc"];
		$tendanhmucnhathuoc = $_POST["tendanhmucnhathuoc"];
		$iddanhmuctongquat = $_POST["iddanhmuctongquat"];
        $datacot 	=		array('TenDanhMucNhaThuoc', 'IDDanhMucTongQuat');
		$datainsert =		array($tendanhmucnhathuoc, $iddanhmuctongquat);
		$rs = $this->danhmucnhathuoc->update_base('danhmucnhathuoc',$datacot,$datainsert,"IDDanhMucNhaThuoc = ".$iddanhmuc);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin danh mục thành công!!");
			$this->getdanhmucnhathuoc();
		}
		else{
			$this->phpAlert("Sửa thông tin danh mục thất bại do dữ liệu!!");
		}
    }
    public function deletedanhmucnhathuoc(){
		$iddanhmucnhathuoc = $_GET["iddanhmuc"];
		$rs = $this->danhmucnhathuoc->delete_base('danhmucnhathuoc',"IDDanhMucNhaThuoc = ".$iddanhmucnhathuoc);
		if($rs['status']){
			$this->phpAlert("Xóa danh mục thành công!!");
			$this->getdanhmucnhathuoc();
		}
		else{
			$this->phpAlert("Xóa danh mục thất bại do dữ liệu!!");
		}
	}
}
?>