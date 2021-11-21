<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class ccongtyduoc extends cbase
{
    protected $congtyduoc;
    function __construct() {
	   $this->congtyduoc = parent::setModel('mcongtyduoc', $this->congtyduoc);
	}
	//Function using to get list data
	public function getcongtyduoc()
	{
		$data = $this->congtyduoc->getcongtyduoc();
        $routeView = new Route();
        $routeView->view('congtyduoc', 'congtyduoc_view', $data);
	}
	public function getcongtyduoctohome()
	{
		$data = $this->congtyduoc->getcongtyduoctohome();
        $routeView = new Route();
        $routeView->view('congtyduoc', 'home_congtyduoc_view', $data);
	}
    public function getchitietcongtyduoc()
	{
		$idcongtyduoc = $_GET["idcongtyduoc"];
		$data = $this->congtyduoc->getchitietcongtyduoc($idcongtyduoc);
        $routeView = new Route();
        $routeView->view('congtyduoc', 'congtyduoc_edit', $data);
	}
	public function doitrangthaicongtyduoc(){
		$idcongtyduoc = $_GET["idcongtyduoc"];
		$this->congtyduoc->doitrangthai($idcongtyduoc);
		$this->getcongtyduoc();
    }
	public function addcongtyduoc(){
		$data = array();
		$routeView = new Route();
		$routeView->view('congtyduoc', 'congtyduoc_add', $data);
    }
    public function editcongtyduoc(){
        $data = array();
		$routeView = new Route();
		$routeView->view('congtyduoc', 'congtyduoc_edit', $data);
    }
	public function doaddcongtyduoc(){
		$tencongtyduoc = $_POST["input-tencongtyduoc"];
		$duongdan = $_POST["input-duongdan"];
		

		$maxid;
        if($this->congtyduoc->getmaxid() == NULL){
            $maxid = 0;
        }else{
            $maxid = (int)($this->congtyduoc->getmaxid()[0]['MAX(IDCongTyDuoc)']) + 1;
        }
		$anhdaidien = $maxid.'-'.$_FILES['input-anhdaidien']['name'];
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/congtyduoc/' .$maxid.'-'.$_FILES['input-anhdaidien']['name']);
        $datacot 	=		array('TenCongTyDuoc', 'WebSite', 'AnhDaiDien', 'HienThi');
        $datainsert =		array($tencongtyduoc, $duongdan, $anhdaidien, 1);
        $rs = $this->congtyduoc->insert_base('congtyduoc',$datacot,$datainsert);
        if($rs['status']){
            $this->phpAlert("Thêm tin tức thành công!");
        }
        else{
            $this->phpAlert("Thêm tin tức thất bại do dữ liệu!!");
        }
        header("Location: index.php?ready=congtyduoc");
    }
    public function doeditcongtyduoc(){
		$IDCongTyDuoc = $_GET["idcongtyduoc"];
		$tencongtyduoc = $_POST["input-tencongtyduoc"];
		$duongdan = $_POST["input-duongdan"];
		$chitietcongtyduoc = $this->congtyduoc->getchitietcongtyduoc($IDCongTyDuoc);
		$anhdaidien = "";
		if($_FILES['input-anhdaidien']['name'] == ""){
			$anhdaidien = $chitietcongtyduoc[0]['AnhDaiDien'];
		}else{
			$anhdaidien = $IDCongTyDuoc.'-'.$_FILES['input-anhdaidien']['name'];
			unlink('../public/image/congtyduoc/'.$chitietcongtyduoc[0]['AnhDaiDien']);
			move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/congtyduoc/' .$IDCongTyDuoc.'-'.$_FILES['input-anhdaidien']['name']);
		}
        
		$datacot 	=		array('TenCongTyDuoc', 'WebSite', 'AnhDaiDien');
		$datainsert =		array($tencongtyduoc, $duongdan, $anhdaidien);
		$rs = $this->congtyduoc->update_base('congtyduoc',$datacot,$datainsert,"IDCongTyDuoc = ".$IDCongTyDuoc);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin công ty dược thành công!!");
		}
		else{
			$this->phpAlert("Sửa thông tin công ty dược thất bại do dữ liệu!!");
		}
		header("Location: index.php?ready=congtyduoc");
    }
    public function dodeletecongtyduoc(){
		$IDCongTyDuoc = $_GET["idcongtyduoc"];
		$rs = $this->congtyduoc->delete_base('congtyduoc',"IDCongTyDuoc = ".$IDCongTyDuoc);
		if($rs['status']){
			$this->phpAlert("Xóa công ty dược thành công!!");
			$this->getcongtyduoc();
		}
		else{
			$this->phpAlert("Xóa công ty dược thất bại do dữ liệu!!");
		}
	}
}
?>