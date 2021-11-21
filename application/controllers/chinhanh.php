<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class chinhanh extends cbase
{
    protected $hinhanh;
    function __construct() {
	   $this->hinhanh = parent::setModel('mhinhanh', $this->hinhanh);
	}
	//Function using to get list data
	public function gethinhanh()
	{
		$data = $this->hinhanh->gethinhanh();
        $routeView = new Route();
        $routeView->view('hinhanh', 'hinhanh_view', $data);
	}
    public function getchitiethinhanh()
	{
		$idhinhanh = $_GET["idhinhanh"];
		$data = $this->hinhanh->getchitiethinhanh($idhinhanh);
        $routeView = new Route();
        $routeView->view('hinhanh', 'hinhanh_edit', $data);
	}
	public function doitrangthaihinhanh(){
		$idhinhanh = $_GET["idhinhanh"];
        $this->hinhanh->doitrangthai($idhinhanh);
        $this->gethinhanh();
    }
	public function addhinhanh(){
		$data = array();
		$routeView = new Route();
		$routeView->view('hinhanh', 'hinhanh_add', $data);
    }
    public function edithinhanh(){
        $idhinhanh = $_GET["idhinhanh"];
		$data = $this->hinhanh->getchitiethinhanh($idhinhanh);
		$routeView = new Route();
		$routeView->view('hinhanh', 'hinhanh_edit', $data);
    }
	public function doaddhinhanh(){
        $maxid;
        if($this->hinhanh->getmaxid() == NULL){
            $maxid = 0;
        }else{
            $maxid = (int)($this->hinhanh->getmaxid()[0]['MAX(IDHinhAnh)']) + 1;
        }
        $anhdaidien = $maxid.'-'.$_FILES['input-anhdaidien']['name'];
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/sanpham/' .$maxid.'-'.$_FILES['input-anhdaidien']['name']);
        $datacot 	=		array('HinhAnh', 'IDNhaThuoc');
        $datainsert =		array($anhdaidien, $_SESSION['idnhathuoc']);
        $rs = $this->hinhanh->insert_base('hinhanh',$datacot,$datainsert);
        if($rs['status']){
            $this->phpAlertLocation("Thêm hình ảnh thành công!","manage.php?ready=hinhanh");
        }
        else{
            $this->phpAlert("Thêm hình ảnh thất bại do dữ liệu!!","manage.php?ready=hinhanh");
        }
        // header("Location: manage.php?ready=hinhanh");
    }
    public function doedithinhanh(){
		$IDhinhanh = $_GET["idhinhanh"];
		$tenhinhanh = $_POST['input-tenhinhanh'];
		$anhdaidien = $IDhinhanh.'-'.$_FILES['input-anhdaidien']['name'];
        $chitiethinhanh = $this->hinhanh->getchitiethinhanh($IDhinhanh);
        unlink('../public/image/hinhanh/'.$chitiethinhanh[0]['AnhDaiDien']);
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/hinhanh/' .$IDhinhanh.'-'.$_FILES['input-anhdaidien']['name']);
        $datacot 	=		array('Tenhinhanh', 'AnhDaiDien');
		$datainsert =		array($tenhinhanh, $anhdaidien);
		$rs = $this->hinhanh->update_base('hinhanh',$datacot,$datainsert,"IDhinhanh = ".$IDhinhanh);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin tin tức thành công!!");
		}
		else{
			$this->phpAlert("Sửa thông tin tin tức thất bại do dữ liệu!!");
		}
        header("Location: manage.php?ready=hinhanh");
    }
    public function dodeletehinhanh(){
		$IDHinhAnh = $_GET["idhinhanh"];
        $chitiethinhanh = $this->hinhanh->getchitiethinhanh($IDHinhAnh);
        unlink('../public/image/sanpham/'.$chitiethinhanh[0]['HinhAnh']);
		$rs = $this->hinhanh->delete_base('hinhanh',"IDHinhAnh = ".$IDHinhAnh);
		if($rs['status']){
			$this->phpAlert("Xóa hình ảnh thành công!!");
			$this->gethinhanh();
		}
		else{
			$this->phpAlert("Xóa hình ảnh thất bại do dữ liệu!!");
		}
	}
    public function showhinh(){
		$hinh = $_GET["hinh"];
        return    '<div class="modal fade show" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="false">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                        <img src="../public/image/sanpham/<?=$data[$i]["$hinh"]?>" alt="image">
                        </div>
                    </div>
                </div>';
	}
}
?>