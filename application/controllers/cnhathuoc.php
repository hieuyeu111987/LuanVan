<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class cnhathuoc extends cbase
{
    protected $nhathuoc;
	protected $sanpham;
	protected $danhmucnhathuoc;
	protected $hinhanh;
	protected $giasanpham;
	protected $giamgiasanpham;
	protected $trungbay;
	protected $hoadonnhaphang;
	protected $hoadonxuathang;
	protected $yeuthich;
	protected $nguoidung;
    function __construct() {
	   $this->nhathuoc = parent::setModel('mnhathuoc', $this->nhathuoc);
	   $this->sanpham = parent::setModel('msanpham', $this->sanpham);
	   $this->danhmucnhathuoc = parent::setModel('mdanhmucnhathuoc', $this->danhmucnhathuoc);
	   $this->hinhanh = parent::setModel('mhinhanh', $this->hinhanh);
	   $this->giasanpham = parent::setModel('mgiasanpham', $this->giasanpham);
	   $this->giamgiasanpham = parent::setModel('mgiamgiasanpham', $this->giamgiasanpham);
	   $this->trungbay = parent::setModel('mtrungbay', $this->trungbay);
	   $this->hoadonnhaphang = parent::setModel('mchitiethoadonnhap', $this->hoadonnhaphang);
	   $this->hoadonxuathang = parent::setModel('mchitiethoadonxuat', $this->hoadonxuathang);
	   $this->yeuthich = parent::setModel('myeuthich', $this->yeuthich);
	   $this->nguoidung = parent::setModel('mnguoidung', $this->nguoidung);
	}
	//Function using to get list data
	public function getnhathuoc()
	{
		$data = $this->nhathuoc->getnhathuoc();
        $routeView = new Route();
        $routeView->view('nhathuoc', 'nhathuoc_view', $data);
	}
    public function getchitietnhathuoc()
	{
		$idnhathuoc = $_GET["idnhathuoc"];
		$data = $this->nhathuoc->getchitietnhathuoc($idnhathuoc);
		$tongsoluongnhap = $this->hoadonnhaphang->getsoluongnhapbynhathuoc($data[0]['IDNhaThuoc']);
		$tongsoluongxuat = $this->hoadonxuathang->getsoluongxuatbynhathuoc($data[0]['IDNhaThuoc']);
		$luotthich = $this->yeuthich->getluotthichbynhathuoc($data[0]['IDNhaThuoc']);
		if($tongsoluongnhap[0]['SoLuong']){
			$data[0]['SoLuongNhapCuaNhaThuoc'] = $tongsoluongnhap[0]['SoLuong'];
		}else{
			$data[0]['SoLuongNhapCuaNhaThuoc'] = 0;
		}
		if($tongsoluongxuat[0]['SoLuong']){
			$data[0]['SoLuongXuatCuaNhaThuoc'] = $tongsoluongxuat[0]['SoLuong'];
		}else{
			$data[0]['SoLuongXuatCuaNhaThuoc'] = 0;
		}
		
		$data[0]['TongLuotThich'] = $luotthich[0]['LuotThich'];
        $routeView = new Route();
        $routeView->view('nhathuoc', 'nhathuoc_detail', $data);
	}
	public function xembando()
	{
		$data = $this->nhathuoc->getnhathuoc();
        $routeView = new Route();
        $routeView->view('nhathuoc', 'home_map', $data);
	}
	public function loadthongtinnhathuoclenhome()
	{
		$data = array();
		$idnhathuoc = $_GET["idnhathuoc"];
		$trungbaygiaodien = $this->trungbay->gettrungbaybynhathuoc($idnhathuoc);
		$thongtinnhathuoc = $this->nhathuoc->getchitietnhathuoc($idnhathuoc);
		$sanphamcuanhathuoc = $this->sanpham->getsanphamtohomebynhathuoc($idnhathuoc);
		for($i = 0; $i < count($sanphamcuanhathuoc); $i++) {
			if(isset($sanphamcuanhathuoc[$i]['IDHinhAnh'])){
				$hinhanh = $this->hinhanh->getchitiethinhanh($sanphamcuanhathuoc[$i]['IDHinhAnh']);
				$sanphamcuanhathuoc[$i]['HinhAnh'] = $hinhanh[0]['HinhAnh'];
			}else{
				$sanphamcuanhathuoc[$i]['HinhAnh'] = NULL;
			}
			if(isset($sanphamcuanhathuoc[$i]['IDSanPham'])){
				$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($sanphamcuanhathuoc[$i]['IDSanPham']);
				$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($sanphamcuanhathuoc[$i]['IDSanPham']);
				if($giasanphammoinhat){
					$sanphamcuanhathuoc[$i]['Gia'] = $giasanphammoinhat[0]['Gia'];
					$sanphamcuanhathuoc[$i]['DonVi'] = $giasanphammoinhat[0]['DonVi'];
					$sanphamcuanhathuoc[$i]['NgayCapNhat'] = $giasanphammoinhat[0]['NgayCapNhat'];
				}else{
					$sanphamcuanhathuoc[$i]['Gia'] = NULL;
					$sanphamcuanhathuoc[$i]['DonVi'] = NULL;
					$sanphamcuanhathuoc[$i]['NgayCapNhat'] = NULL;
				}
				if($giamgiasanphamhientai){
					$sanphamcuanhathuoc[$i]['GiaGiam'] = $giamgiasanphamhientai[0]['Gia'];
					$sanphamcuanhathuoc[$i]['NgayBatDau'] = $giamgiasanphamhientai[0]['NgayKetThuc'];
					$sanphamcuanhathuoc[$i]['NgayKetThuc'] = $giamgiasanphamhientai[0]['NgayBatDau'];
				}else{
					$sanphamcuanhathuoc[$i]['GiaGiam'] = NULL;
					$sanphamcuanhathuoc[$i]['NgayBatDau'] = NULL;
					$sanphamcuanhathuoc[$i]['NgayKetThuc'] = NULL;
				}
			}else{
				$sanphamcuanhathuoc[$i]['Gia'] = NULL;
				$sanphamcuanhathuoc[$i]['DonVi'] = NULL;
				$sanphamcuanhathuoc[$i]['NgayCapNhat'] = NULL;
				$sanphamcuanhathuoc[$i]['GiaGiam'] = NULL;
				$sanphamcuanhathuoc[$i]['NgayBatDau'] = NULL;
				$sanphamcuanhathuoc[$i]['NgayKetThuc'] = NULL;
			}
		}
		$danhsachdanhmucnhathuoc = $this->danhmucnhathuoc->getdanhmucnhathuocbynhathuoc($idnhathuoc);
		$data = array('trungbay'=>$trungbaygiaodien, 'nhathuoc'=>$thongtinnhathuoc, 'sanpham'=>$sanphamcuanhathuoc, 'danhmucnhathuoc'=>$danhsachdanhmucnhathuoc);
		// var_dump($data['sanpham'][0]['TenSanPham']);die();
        $routeView = new Route();
        $routeView->view('nhathuoc', 'home_nhathuoc_view', $data);
	}
	public function getthongtinnhathuoctomanage()
	{
		$data = $this->nhathuoc->getthongtinnhathuoctomanage();
		$tongsoluongnhap = $this->hoadonnhaphang->getsoluongnhapbynhathuoc($data[0]['IDNhaThuoc']);
		$tongsoluongxuat = $this->hoadonxuathang->getsoluongxuatbynhathuoc($data[0]['IDNhaThuoc']);
		$luotthich = $this->yeuthich->getluotthichtomanage();
		if($tongsoluongnhap[0]['SoLuong']){
			$data[0]['SoLuongNhapCuaNhaThuoc'] = $tongsoluongnhap[0]['SoLuong'];
		}else{
			$data[0]['SoLuongNhapCuaNhaThuoc'] = 0;
		}
		if($tongsoluongxuat[0]['SoLuong']){
			$data[0]['SoLuongXuatCuaNhaThuoc'] = $tongsoluongxuat[0]['SoLuong'];
		}else{
			$data[0]['SoLuongXuatCuaNhaThuoc'] = 0;
		}
		$data[0]['TongLuotThich'] = $luotthich[0]['LuotThich'];
        $routeView = new Route();
        $routeView->view('nhathuoc', 'manage_nhathuoc_view', $data);
	}
	public function geteditgiaodien()
	{
		$data = array();
		$idnhathuoc = $_SESSION['idnhathuoc'];
		$trungbaygiaodien = $this->trungbay->gettrungbaybynhathuoc($idnhathuoc);
		$data = $trungbaygiaodien;
        $routeView = new Route();
        $routeView->view('nhathuoc', 'manage_editgiaodiennhathuoc_view', $data);
	}
	public function doitrangthainhathuoc(){
		$idnhathuoc = $_GET["idnhathuoc"];
		$this->nhathuoc->doitrangthai($idnhathuoc);
		$this->getnhathuoc();
    }
	public function addnhathuoc(){
		$data = array();
		$routeView = new Route();
		$routeView->view('nhathuoc', 'nhathuoc_add', $data);
    }
    public function editnhathuoc(){
        $s = $_SERVER['REQUEST_URI'];
        $vitritennhathuoc = strrpos($s,"=");
        $nhathuoc = substr($s, $vitritennhathuoc + 1);
		$tennhathuoc = $this->asc2($nhathuoc);
		$routeView = new Route();
		$routeView->view('nhathuoc', 'nhathuoc_edit', $tennhathuoc);
    }
	public function doaddnhathuoc(){
		$tennhathuoc = $_POST["input-tennhathuoc"];
		$sdt = $_POST["input-sdt"];
		$email = $_POST["input-email"];
		$diachi = $_POST["input-diachi"];
		$diachi = $_POST["input-diachi"];
		$website = $_POST["input-website"];
		$mapaypal = $_POST["input-mapaypal"];
		$anhdaidien = $_FILES['input-anhdaidien']['name'];
		$vitri = $_POST["input-vitri"];

		$maxid;
        if($this->nhathuoc->getmaxid() == NULL){
            $maxid = 0;
        }else{
            $maxid = (int)($this->nhathuoc->getmaxid()[0]['MAX(IDNhaThuoc)']) + 1;
        }
		$anhdaidien = $maxid.'-'.$_FILES['input-anhdaidien']['name'];
		$anhgiayphep = $maxid.'-'.$_FILES['input-anhgiayphep']['name'];
        move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/nhathuoc/' .$maxid.'-'.$_FILES['input-anhdaidien']['name']);
		move_uploaded_file($_FILES['input-anhgiayphep']['tmp_name'], '../public/image/giayphep/' .$maxid.'-'.$_FILES['input-anhgiayphep']['name']);

		
        $datacot 	=		array('TenNhaThuoc', 'DiaChi', 'GiayPhep', 'SDT', 'Email', 'WebSite', 'ToaDo', 'NgayDangKy', 'TrangThai', 'AnhDaiDien', 'IDPayPal');
		$datainsert =		array($tennhathuoc, $diachi, $anhgiayphep, $sdt, $email, $website, $vitri, date("Y-m-d"), 1, $anhdaidien, $mapaypal);
		$rs = $this->nhathuoc->insert_base('nhathuoc',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm nhà thuốc thành công!!");
			$datacotnguoidung 	=		array('IDNhaThuoc', 'NguoiDangKy', 'LoaiTaiKhoan');
			$datainsertnguoidung =		array($this->nhathuoc->getmaxid()[0]['MAX(IDNhaThuoc)'], 1, 2);
			$this->nguoidung->update_base('nguoidung',$datacotnguoidung,$datainsertnguoidung,"IDNguoiDung = ".$_SESSION['user_id']);
			$_SESSION['loaitaikhoan'] = $this->nguoidung->getnguoidungbyid($_SESSION['user_id'])[0]['LoaiTaiKhoan'];
		}
		else{
			$this->phpAlert("Thêm nhà thuốc thất bại do dữ liệu!!");
		}
		header('Location: dashboard.php');
    }
    public function doeditnhathuoc(){
		$tennhathuoc = $_POST["input-tennhathuoc"];
		$email = $_POST["input-email"];
		$sdt = $_POST["input-sdt"];
		$website = $_POST["input-website"];
		$diachi = $_POST["input-diachi"];
		$mapaypal = $_POST["input-mapaypal"];

		$thongtinnhathuoc = $this->nhathuoc->getthongtinnhathuoctomanage();

		// $anhdaidien = $_FILES['input-anhdaidien']['name'];
		
		$anhdaidien = "";
		if($_FILES['input-anhdaidien']['name'] == ""){
			$anhdaidien = $thongtinnhathuoc[0]['AnhDaiDien'];
		}else{
			$anhdaidien = $thongtinnhathuoc[0]['IDNhaThuoc'].'-'.$_FILES['input-anhdaidien']['name'];
			unlink('../public/image/nhathuoc/'.$thongtinnhathuoc[0]['AnhDaiDien']);
        	move_uploaded_file($_FILES['input-anhdaidien']['tmp_name'], '../public/image/nhathuoc/'.$thongtinnhathuoc[0]['IDNhaThuoc'].'-'.$_FILES['input-anhdaidien']['name']);
		}

		$anhgiayphep = "";
		if($_FILES['input-anhgiayphep']['name'] == ""){
			$anhgiayphep = $thongtinnhathuoc[0]['GiayPhep'];
		}else{
			$anhgiayphep = $thongtinnhathuoc[0]['IDNhaThuoc'].'-'.$_FILES['input-anhgiayphep']['name'];
			unlink('../public/image/giayphep/'.$thongtinnhathuoc[0]['GiayPhep']);
        	move_uploaded_file($_FILES['input-anhgiayphep']['tmp_name'], '../public/image/giayphep/'.$thongtinnhathuoc[0]['IDNhaThuoc'].'-'.$_FILES['input-anhgiayphep']['name']);
		}
		
		$datacot 	=		array('TenNhaThuoc', 'DiaChi', 'GiayPhep', 'SDT', 'Email', 'WebSite', 'AnhDaiDien', 'IDPayPal');
		$datainsert =		array($tennhathuoc, $diachi, $anhgiayphep, $sdt, $email, $website, $anhdaidien, $mapaypal);
		$rs = $this->nhathuoc->update_base('nhathuoc',$datacot,$datainsert,"IDNhaThuoc = ".$thongtinnhathuoc[0]['IDNhaThuoc']);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin nhà thuốc thành công!!");
		}
		else{
			$this->phpAlert("Sửa thông tin nhà thuốc thất bại do dữ liệu!!");
		}
		header("Location: manage.php?model=nhathuoc&ready=thongtinnhathuoctomanage");
    }

	public function dothaydoivitri(){
		$x = $_GET["x"];
		$y = $_GET["y"];
		$toado = $x.", ".$y;
        $datacot 	=		array('ToaDo');
		$datainsert =		array($toado);
		$rs = $this->nhathuoc->update_base('nhathuoc',$datacot,$datainsert,"IDNhaThuoc = ".$_SESSION['idnhathuoc']);
		if($rs['status']){
			$this->phpAlert("Đã thay đổi vị trí!!");
			$this->getthongtinnhathuoctomanage();
		}
		else{
			$this->phpAlert("Thay đổi vị trí thất bại do dữ liệu!!");
		}
    }

	public function doaddgiaodien(){
		$idnhathuoc = $_SESSION['idnhathuoc'];
		$noidung = $_POST["noidung"];
		$kichthuoc = $_POST["kichthuoc"];
		$mausac = $_POST["mausac"];
        $datacot 	=		array('NoiDung','KichThuoc','MauSac','IDNhaThuoc');
		$datainsert =		array($noidung, $kichthuoc, $mausac, $idnhathuoc);
		$rs = $this->trungbay->insert_base('trungbay',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thay đổi giao diện thành công!!");
			$this->geteditgiaodien();
		}
		else{
			$this->phpAlert("Thay đổi giao diện thất bại do dữ liệu!!");
		}
    }
	public function doeditgiaodien(){
		$idtrungbay = $_POST["idtrungbay"];
		$noidung = $_POST["noidung"];
		$kichthuoc = $_POST["kichthuoc"];
		$mausac = $_POST["mausac"];
        $datacot 	=		array('NoiDung','KichThuoc','MauSac');
		$datainsert =		array($noidung, $kichthuoc, $mausac);
		$rs = $this->trungbay->update_base('trungbay',$datacot,$datainsert,"IDTrungBay = ".$idtrungbay);
		if($rs['status']){
			$this->phpAlert("Thay đổi giao diện thành công!!");
			$this->geteditgiaodien();
		}
		else{
			$this->phpAlert("Thay đổi giao diện thất bại do dữ liệu!!");
		}
    }
    public function dodeletenhathuoc(){
        $s = $_SERVER['REQUEST_URI'];
        $vitritennhathuoc = strrpos($s,"=");
		$nhathuoc = substr($s, $vitritennhathuoc + 1);
		$nhathuoc = $this->asc2($nhathuoc);
		$rs = $this->nhathuoc->deletenhathuoc_base('nhathuoc',"tennhathuoc = ".'"'.$nhathuoc.'"');
		if($rs['status']){
			$this->phpAlert("Thay đổi giao diện thành công!!");
			$this->geteditgiaodien();
		}
		else{
			$this->phpAlert("Xóa sinh viên thất bại do dữ liệu!!");
		}
	}
	public function dodeletegiaodien(){
        $idtrungbay = $_POST["idtrungbay"];
		$rs = $this->trungbay->delete_base('trungbay',"IDTrungBay = ".$idtrungbay);
		if($rs['status']){
			$this->phpAlert("Thay đổi giao diện thành công!!");
			$this->geteditgiaodien();
		}
		else{
			$this->phpAlert("Thay đổi giao diện thất bại do dữ liệu!!");
		}
	}
}
?>