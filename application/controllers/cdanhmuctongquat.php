<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class cdanhmuctongquat extends cbase
{
    protected $danhmuctongquat;
    function __construct() {
	   $this->danhmuctongquat = parent::setModel('mdanhmuctongquat', $this->danhmuctongquat);
	}
	//Function using to get list data
	public function getdanhmuctongquat()
	{
		$data = $this->danhmuctongquat->getdanhmuctongquat();
        $routeView = new Route();
        $routeView->view('danhmuctongquat', 'danhmuctongquat_view', $data);
	}
	public function getdanhmuctongquattohome()
	{
		$data = $this->danhmuctongquat->getdanhmuctongquat();
        $routeView = new Route();
        $routeView->view('danhmuctongquat', 'home_danhmuctongquat_view', $data);
	}
    public function getchitietdanhmuctongquat()
	{
		$iddanhmuctongquat = $_GET["iddanhmuc"];
		$data = $this->danhmuctongquat->getchitietdanhmuctongquat($iddanhmuctongquat);
        $routeView = new Route();
        $routeView->view('danhmuctongquat', 'danhmuctongquat_edit', $data);
	}
	public function doitrangthaidanhmuctongquat(){
		$iddanhmuctongquat = $_GET["iddanhmuctongquat"];
		$this->danhmuctongquat->doitrangthai($iddanhmuctongquat);
		$this->getdanhmuctongquat();
    }
	public function adddanhmuctongquat(){
		$data = array();
		$routeView = new Route();
		$routeView->view('danhmuctongquat', 'danhmuctongquat_add', NULL);
    }
    public function editdanhmuctongquat(){
        $s = $_SERVER['REQUEST_URI'];
        $vitritendanhmuctongquat = strrpos($s,"=");
        $danhmuctongquat = substr($s, $vitritendanhmuctongquat + 1);
		$tendanhmuctongquat = $this->asc2($danhmuctongquat);
		$routeView = new Route();
		$routeView->view('danhmuctongquat', 'danhmuctongquat_edit', $tendanhmuctongquat);
    }
	public function checktendanhmuctongquat(){
		$tendanhmuctongquat         = parent::getValue(1, 'tendanhmuctongquat', '');
		$checkTen = $this->danhmuctongquat->checkten("danhmuctongquat","tendanhmuctongquat",$tendanhmuctongquat);
		echo $checkTen ;
	}
	public function doadddanhmuctongquat(){
		$tendanhmuctongquat = $_POST["tendanhmuctongquat"];
        $datacot 	=		array('tendanhmuctongquat');
		$datainsert =		array($tendanhmuctongquat);
		$rs = $this->danhmuctongquat->insert_base('danhmuctongquat',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm danh mục thành công!!");
			$this->getdanhmuctongquat();
		}
		else{
			$this->phpAlert("Thêm danh mục thất bại do dữ liệu!!");
		}
    }
    public function doeditdanhmuctongquat(){
        $iddanhmuc = $_POST["iddanhmuc"];
		$tendanhmuctongquat = $_POST["tendanhmuctongquat"];
        $datacot 	=		array('TenDanhMucTongQuat');
		$datainsert =		array($tendanhmuctongquat);
		$rs = $this->danhmuctongquat->update_base('danhmuctongquat',$datacot,$datainsert,"IDDanhMucTongQuat = ".$iddanhmuc);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin danh mục thành công!!");
			$this->getdanhmuctongquat();
		}
		else{
			$this->phpAlert("Sửa thông tin danh mục thất bại do dữ liệu!!");
		}
    }
    public function deletedanhmuctongquat(){
		$iddanhmuctongquat = $_GET["iddanhmuc"];
		$rs = $this->danhmuctongquat->delete_base('danhmuctongquat',"IDDanhMucTongQuat = ".$iddanhmuctongquat);
		if($rs['status']){
			$this->phpAlert("Xóa danh mục thành công!!");
			$this->getdanhmuctongquat();
		}
		else{
			$this->phpAlert("Xóa danh mục thất bại do dữ liệu!!");
		}
	}
}
?>