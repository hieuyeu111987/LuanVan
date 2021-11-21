<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class ctintuc extends cbase
{
    protected $tintuc;
    function __construct() {
	   $this->tintuc = parent::setModel('mtintuc', $this->tintuc);
	}
	//Function using to get list data
	public function gettintuc()
	{
		$data = $this->tintuc->gettintuc();
        $routeView = new Route();
        $routeView->view('tintuc', 'tintuc_view', $data);
	}
    public function getchitiettintuc()
	{
		$idtintuc = $_GET["idtintuc"];
		$data = $this->tintuc->getchitiettintuc($idtintuc);
        $routeView = new Route();
        $routeView->view('tintuc', 'tintuc_edit', $data);
	}
	public function doitrangthaitintuc(){
		$idtintuc = $_GET["idtintuc"];
        $this->tintuc->doitrangthai($idtintuc);
        $this->gettintuc();
    }
	public function addtintuc(){
		$data = array();
		$routeView = new Route();
		$routeView->view('tintuc', 'tintuc_add', $data);
    }
    public function edittintuc(){
        $idtintuc = $_GET["idtintuc"];
		$data = $this->tintuc->getchitiettintuc($idtintuc);
		$routeView = new Route();
		$routeView->view('tintuc', 'tintuc_edit', $data);
    }
	public function doaddtintuc(){
		$tentintuc = $_POST["input-tentintuc"];
		$anhdaidien = $_FILES['input-anhdaidien']['name'];
        $maxid;
        if($this->tintuc->getmaxid() == NULL){
            $maxid = 0;
        }else{
            $maxid = (int)($this->tintuc->getmaxid()[0]['MAX(IDTinTuc)']) + 1;
        }
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/tintuc/' .$maxid.'-'.$_FILES['input-anhdaidien']['name']);
        $datacot 	=		array('TenTinTuc', 'AnhDaiDien', 'TrangThai');
        $datainsert =		array($tentintuc, $anhdaidien, 1);
        $rs = $this->tintuc->insert_base('tintuc',$datacot,$datainsert);
        if($rs['status']){
            $this->phpAlert("Thêm tin tức thành công!");
        }
        else{
            $this->phpAlert("Thêm tin tức thất bại do dữ liệu!!");
        }
        header("Location: index.php?ready=tintuc");
    }
    public function doedittintuc(){
		$IDTinTuc = $_GET["idtintuc"];
		$tentintuc = $_POST['input-tentintuc'];
		$anhdaidien = $IDTinTuc.'-'.$_FILES['input-anhdaidien']['name'];
        $chitiettintuc = $this->tintuc->getchitiettintuc($IDTinTuc);
        unlink('../public/image/tintuc/'.$chitiettintuc[0]['AnhDaiDien']);
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/tintuc/' .$IDTinTuc.'-'.$_FILES['input-anhdaidien']['name']);
        $datacot 	=		array('TenTinTuc', 'AnhDaiDien');
		$datainsert =		array($tentintuc, $anhdaidien);
		$rs = $this->tintuc->update_base('tintuc',$datacot,$datainsert,"IDTinTuc = ".$IDTinTuc);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin tin tức thành công!!");
		}
		else{
			$this->phpAlert("Sửa thông tin tin tức thất bại do dữ liệu!!");
		}
        header("Location: index.php?ready=tintuc");
    }
    public function dodeletetintuc(){
		$IDtintuc = $_GET["idtintuc"];
        $chitiettintuc = $this->tintuc->getchitiettintuc($IDtintuc);
        unlink('../public/image/tintuc/'.$chitiettintuc[0]['AnhDaiDien']);
		$rs = $this->tintuc->delete_base('tintuc',"IDtintuc = ".$IDtintuc);
		if($rs['status']){
			$this->phpAlert("Xóa tin tức thành công!!");
			$this->gettintuc();
		}
		else{
			$this->phpAlert("Xóa tin tức thất bại do dữ liệu!!");
		}
	}
}
?>