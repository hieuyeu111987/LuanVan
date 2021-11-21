<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class choadonxuat extends cbase
{
    protected $hoadonxuat;
	protected $hoadonpaypal;
	protected $congtyduoc;
	protected $nhathuoc;
    protected $chitiethoadonxuat;
    protected $sanpham;
	protected $hinhanh;
	protected $giasanpham;
	protected $giamgiasanpham;
	protected $nguoidung;
    function __construct() {
	   $this->hoadonxuat = parent::setModel('mhoadonxuat', $this->hoadonxuat);
	   $this->congtyduoc = parent::setModel('mcongtyduoc', $this->congtyduoc);
	   $this->nhathuoc = parent::setModel('mnhathuoc', $this->nhathuoc);
       $this->chitiethoadonxuat = parent::setModel('mchitiethoadonxuat', $this->chitiethoadonxuat);
       $this->sanpham = parent::setModel('msanpham', $this->sanpham);
       $this->hinhanh = parent::setModel('mhinhanh', $this->hinhanh);
       $this->giasanpham = parent::setModel('mgiasanpham', $this->giasanpham);
       $this->giamgiasanpham = parent::setModel('mgiamgiasanpham', $this->giamgiasanpham);
       $this->nguoidung = parent::setModel('mnguoidung', $this->nguoidung);
       $this->hoadonpaypal = parent::setModel('mhoadonpaypal', $this->hoadonpaypal);
	}
	//Function using to get list data
	public function gethoadonxuat()
	{
		$dshoadonxuat = $this->hoadonxuat->getidhoadonxuat();
		$dshoadonpaypal = $this->hoadonpaypal->getidhoadonpaypal();
		for($i = 0; $i < count($dshoadonxuat); $i++) {
			if(isset($dshoadonxuat[$i]['IDHoaDonXuatHang'])){
				$thongtinhoadonxuathang = $this->hoadonxuat->getchitiethoadonxuat($dshoadonxuat[$i]['IDHoaDonXuatHang']);
				$dshoadonxuat[$i]['TenNguoiMua'] = $thongtinhoadonxuathang[0]['TenNguoiMua'];
				$dshoadonxuat[$i]['NgayDatHang'] = $thongtinhoadonxuathang[0]['NgayDatHang'];
			}else{
				$this->phpAlert("Lỗi dữ liệu!");
			}
		}
		for($i = 0; $i < count($dshoadonpaypal); $i++) {
			if(isset($dshoadonpaypal[$i]['IDHoaDonPayPal'])){
				$thongtinhoadonpaypal = $this->hoadonpaypal->getchitiethoadonpaypal($dshoadonpaypal[$i]['IDHoaDonPayPal']);
				$dshoadonpaypal[$i]['TenNguoiMua'] = $thongtinhoadonpaypal[0]['PayerName'];
				$dshoadonpaypal[$i]['NgayDatHang'] = $thongtinhoadonpaypal[0]['CreateTime'];
			} else{
				$this->phpAlert("Lỗi dữ liệu!");
			}
		}
		$data = array('hoadonxuat'=>$dshoadonxuat, 'hoadonpaypal'=>$dshoadonpaypal);
		// array_push($giohang,$phantu);
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'hoadonxuat_view', $data);
	}
    public function getchitiethoadonxuat($id = null)
	{
		$idhoadonxuat = null;
		if($id){
			$idhoadonxuat = $id;
		}else{
			$idhoadonxuat = $_GET["idhoadonxuat"];
		}
        $hoadonxuat = $this->hoadonxuat->getchitiethoadonxuat($idhoadonxuat);
        $chitiethoadonxuat = $this->chitiethoadonxuat->getchitiethoadonxuat($idhoadonxuat);
        $data = array("hoadonxuat"=>$hoadonxuat, "chitiethoadonxuat"=>$chitiethoadonxuat);
		// var_dump($data['hoadonxuat'][0]);die();
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'hoadonxuat_edit', $data);
	}
	public function getviewchitiethoadonxuat($id = null)
	{
		$idhoadonxuat = null;
		if($id){
			$idhoadonxuat = $id;
		}else{
			$idhoadonxuat = $_POST['idhoadonxuat'];
		}
		$chitiethoadonxuat = $this->chitiethoadonxuat->getchitiethoadonxuat($idhoadonxuat);
		$sanpham = $this->sanpham->getsanphamtomanage();
		for($i = 0; $i < count($chitiethoadonxuat); $i++) {
			if(isset($chitiethoadonxuat[$i]['IDSanPham'])){
				$sanpham = $this->sanpham->getchitietsanpham($chitiethoadonxuat[$i]['IDSanPham']);
				$chitiethoadonxuat[$i]['TenSanPham'] = $sanpham[0]['TenSanPham'];
			}else{
				$chitiethoadonxuat[$i]['TenSanPham'] = NULL;
			}
		}
        $routeView = new Route();
		$data = array("chitiethoadonxuat"=>$chitiethoadonxuat, "sanpham"=>$sanpham, "idhoadonxuat"=>$idhoadonxuat);
        $routeView->view('chitiethoadonxuat', 'chitiethoadonxuat_view', $data);
	}
	
	public function getdonhang()
	{
		
		$dshoadonxuat = $this->hoadonxuat->getiddonhanghoadonxuat();
		$dshoadonpaypal = $this->hoadonpaypal->getiddonhanghoadonpaypal();
		for($i = 0; $i < count($dshoadonxuat); $i++) {
			if(isset($dshoadonxuat[$i]['IDHoaDonXuatHang'])){
				$thongtinhoadonxuathang = $this->hoadonxuat->getchitiethoadonxuat($dshoadonxuat[$i]['IDHoaDonXuatHang']);
				$dshoadonxuat[$i]['TenNguoiMua'] = $thongtinhoadonxuathang[0]['TenNguoiMua'];
				$dshoadonxuat[$i]['NgayDatHang'] = $thongtinhoadonxuathang[0]['NgayDatHang'];
			}else{
				$this->phpAlert("Lỗi dữ liệu!");
			}
		}
		for($i = 0; $i < count($dshoadonpaypal); $i++) {
			if(isset($dshoadonpaypal[$i]['IDHoaDonPayPal'])){
				$thongtinhoadonpaypal = $this->hoadonpaypal->getchitiethoadonpaypal($dshoadonpaypal[$i]['IDHoaDonPayPal']);
				$dshoadonpaypal[$i]['TenNguoiMua'] = $thongtinhoadonpaypal[0]['PayerName'];
				$dshoadonpaypal[$i]['NgayDatHang'] = $thongtinhoadonpaypal[0]['CreateTime'];
			} else{
				$this->phpAlert("Lỗi dữ liệu!");
			}
		}
		$data = array('hoadonxuat'=>$dshoadonxuat, 'hoadonpaypal'=>$dshoadonpaypal);
		// array_push($giohang,$phantu);
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'donhang_view', $data);
	}

	public function getchitiethoadonxuathang()
	{
		$data = array();
		$idhoadonxuat = $_GET['idhoadonxuathang'];
		$tab = $_GET['tab'];
		$thongtinhoadonxuathang = $this->hoadonxuat->getchitiethoadonxuat($idhoadonxuat);
		$thongtinchitiethoadonxuathang = $this->chitiethoadonxuat->getchitiethoadonxuatbyhoadon($thongtinhoadonxuathang[0]['IDHoaDonXuatHang']);
		for ($i=0; $i < count($thongtinchitiethoadonxuathang); $i++) { 
			if(isset($thongtinchitiethoadonxuathang[$i]['IDSanPham'])){
				$thongtinsanpham = $this->sanpham->getchitietsanpham($thongtinchitiethoadonxuathang[$i]['IDSanPham']);
				$thongtinchitiethoadonxuathang[$i]['TenSanPham'] = $thongtinsanpham[0]['TenSanPham'];
			}
		}
		$data = array('hoadonxuat'=>$thongtinhoadonxuathang, 'chitiethoadonxuat'=>$thongtinchitiethoadonxuathang, 'tab'=>$tab);
		$routeView = new Route();
        $routeView->view('chitiethoadonxuat', 'chitiethoadonxuathang_detail_view', $data);
	}

	public function getchitiethoadonpaypal()
	{
		$data = array();
		$idhoadonpaypal = $_GET['idhoadonpaypal'];
		$tab = $_GET['tab'];
		$thongtinhoadonpaypal = $this->hoadonpaypal->getchitiethoadonpaypal($idhoadonpaypal);
		$thongtinchitiethoadonxuathang = $this->chitiethoadonxuat->getchitiethoadonpaypalbyhoadon($thongtinhoadonpaypal[0]['IDHoaDonPayPal']);
		for ($i=0; $i < count($thongtinchitiethoadonxuathang); $i++) { 
			if(isset($thongtinchitiethoadonxuathang[$i]['IDSanPham'])){
				$thongtinsanpham = $this->sanpham->getchitietsanpham($thongtinchitiethoadonxuathang[$i]['IDSanPham']);
				$thongtinchitiethoadonxuathang[$i]['TenSanPham'] = $thongtinsanpham[0]['TenSanPham'];
			}
		}
		$data = array('hoadonpaypal'=>$thongtinhoadonpaypal, 'chitiethoadonxuat'=>$thongtinchitiethoadonxuathang, 'tab'=>$tab);
		$routeView = new Route();
        $routeView->view('chitiethoadonxuat', 'chitiethoadonpaypal_detail_view', $data);
	}

	public function giaohanghoadonxuathang(){
		$idhoadonxuathang = $_GET['idhoadonxuathang'];
		$datacot 	=		array('GiaoHang');
		$datainsert =		array(1);
		$rs = $this->chitiethoadonxuat->update_base('hoadonxuathang',$datacot,$datainsert,"IDHoaDonXuatHang = ".$idhoadonxuathang);
		if($rs['status']){
			$this->phpAlert("Xác nhận đã giao hàng!!");
		}
		else{
			$this->phpAlert("Thao tác thất bại do dữ liệu!!");
		}
		$this->getdonhang();
    }

	public function giaohanghoadonpaypal(){
		$idhoadonpaypal = $_GET['idhoadonpaypal'];
		$datacot 	=		array('GiaoHang');
		$datainsert =		array(1);
		$rs = $this->hoadonpaypal->update_base('hoadonpaypal',$datacot,$datainsert,"IDHoaDonPayPal = '$idhoadonpaypal'");
		if($rs['status']){
			$this->phpAlert("Xác nhận đã giao hàng!!");
		}
		else{
			$this->phpAlert("Thao tác thất bại do dữ liệu!!");
		}
		$this->getdonhang();
    }

	public function addhoadonxuat(){
		$data = $this->congtyduoc->getcongtyduoc();
		$routeView = new Route();
		$routeView->view('hoadonxuat', 'hoadonxuat_add', $data);
    }
	public function addchitiethoadonxuat()
	{
		$idhoadonxuat = $_GET['idhoadonxuat'];
		$sanpham = $this->sanpham->getsanphamtomanage();
        $routeView = new Route();
		$data = array("sanpham"=>$sanpham, "idhoadonxuat"=>$idhoadonxuat);
        $routeView->view('chitiethoadonxuat', 'chitiethoadonxuat_add', $data);
	}
	public function editchitiethoadonxuat()
	{
		$idhoadonxuat = $_GET['idhoadonxuat'];
		$chitiethoadonxuat = $this->chitiethoadonxuat->getchitietchitiethoadonxuat($idhoadonxuat);
		$sanpham = $this->sanpham->getsanphamtomanage();
		for($i = 0; $i < count($chitiethoadonxuat); $i++) {
			if(isset($chitiethoadonxuat[$i]['IDSanPham'])){
				$chitietsanpham = $this->sanpham->getchitietsanpham($chitiethoadonxuat[$i]['IDSanPham']);
				$chitiethoadonxuat[$i]['TenSanPham'] = $chitietsanpham[0]['TenSanPham'];
			}else{
				$chitiethoadonxuat[$i]['TenSanPham'] = NULL;
			}
		}
		for($i = 0; $i < count($sanpham); $i++) {
			if($sanpham[$i]['IDSanPham'] == $chitiethoadonxuat[0]['IDSanPham']){
				unset($sanpham[$i]);
			}
		}
        $routeView = new Route();
		$data = array("chitiethoadonxuat"=>$chitiethoadonxuat, "sanpham"=>$sanpham);
		$routeView->view('chitiethoadonxuat', 'chitiethoadonxuat_edit', $data);
	}
	public function doaddhoadonxuat(){
		$tencongtyduoc = $_POST["tencongtyduoc"];
		$ngaythanhtoan = $_POST["ngaythanhtoan"];
		$idnhathuoc = $_SESSION['idnhathuoc'];
        $datacot 	=		array('NgayThanhToan', 'IDCongTyDuoc', 'IDNhaThuoc');
		$datainsert =		array($ngaythanhtoan, $tencongtyduoc, $idnhathuoc);
		$rs = $this->hoadonxuat->insert_base('hoadonxuathang',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm hóa đơn thành công, Bạn cần thêm sản phẩm vào hóa đơn!");
			$idhoadonxuat = ($this->hoadonxuat->getmaxhoadonxuat())[0]['MAX(IDHoaDonXuatHang)'];
			$this->getchitiethoadonxuat($idhoadonxuat);
		}
		else{
			$this->phpAlert("Thêm hóa đơn thất bại do dữ liệu!");
		}
    }
    public function doaddchitiethoadonxuat(){
		$idsanpham = $_POST["tensanpham"];
		$soluong = $_POST["soluong"];
		$gia = $_POST["gia"];
		$donvi = $_POST["donvi"];
		$idhoadonxuat = $_POST["idhoadonxuat"];
        $datacot 	=		array('SoLuong', 'Gia', 'DonVi', 'IDSanPham', 'IDHoaDonXuatHang');
		$datainsert =		array($soluong, $gia, $donvi, $idsanpham, $idhoadonxuat);
		$rs = $this->chitiethoadonxuat->insert_base('chitiethoadonxuathang',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm sản phẩm vào hóa đơn thành công!!");
			$this->getviewchitiethoadonxuat();
		}
		else{
			$this->phpAlert("Thêm sản phẩm vào hóa đơn thất bại do dữ liệu!!");
		}
    }
	public function doeditchitiethoadonxuat(){
		$idsanpham = $_POST["tensanpham"];
		$soluong = $_POST["soluong"];
		$gia = $_POST["gia"];
		$donvi = $_POST["donvi"];
		$idhoadonxuat = $_POST["idhoadonxuat"];
		$idchitiethoadonxuat = $_POST["idchitiethoadonxuat"];
        $datacot 	=		array('SoLuong', 'Gia', 'DonVi', 'IDSanPham');
		$datainsert =		array($soluong, $gia, $donvi, $idsanpham);
		$rs = $this->chitiethoadonxuat->update_base('chitiethoadonxuathang',$datacot,$datainsert,"IDChiTietHoaDonXuatHang = ".$idchitiethoadonxuat);
		if($rs['status']){
			$this->phpAlert("Thay đổi thông tin  hóa đơn thành công!!");
			$this->getviewchitiethoadonxuat();
		}
		else{
			$this->phpAlert("Thêm đổi thông tin hóa đơn thất bại do dữ liệu!!");
		}
    }
    public function doedithoadonxuat(){
        $iddanhmuc = $_POST["iddanhmuc"];
		$tenhoadonxuat = $_POST["tenhoadonxuat"];
		$idcongtyduoc = $_POST["idcongtyduoc"];
        $datacot 	=		array('Tenhoadonxuat', 'IDcongtyduoc');
		$datainsert =		array($tenhoadonxuat, $idcongtyduoc);
		$rs = $this->hoadonxuat->update_base('hoadonxuat',$datacot,$datainsert,"IDhoadonxuat = ".$iddanhmuc);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin danh mục thành công!!");
			$this->gethoadonxuat();
		}
		else{
			$this->phpAlert("Sửa thông tin danh mục thất bại do dữ liệu!!");
		}
    }
    public function deletehoadonxuathang(){
		$idhoadonxuat = $_GET["idhoadonxuat"];
		$rs = $this->hoadonxuat->delete_base('hoadonxuathang',"IDHoaDonXuatHang = ".$idhoadonxuat);
		if($rs['status']){
			$this->phpAlert("Xóa hóa đơn thành công!!");
			$this->gethoadonxuat();
		}
		else{
			$this->phpAlert("Xóa hóa đơn thất bại do dữ liệu!!");
		}
	}
	public function deletehoadonpaypal(){
		$idhoadonpaypal = $_GET["idhoadonpaypal"];
		$rs = $this->hoadonpaypal->delete_base('hoadonpaypal',"IDHoaDonPayPal = '".$idhoadonpaypal."'");
		if($rs['status']){
			$this->phpAlert("Xóa hóa đơn thành công!!");
			$this->gethoadonxuat();
		}
		else{
			$this->phpAlert("Xóa hóa đơn thất bại do dữ liệu!!");
		}
	}


    public function getthanhtoan()
	{
		$data = array();
		$giohang = array();
		$sosanpham = 0;
		$tongsoluong = 0;
		$tongtien = 0;
		$cookie = $_COOKIE;
		unset($cookie['PHPSESSID']);
		unset($cookie['sidenav-state']);
		foreach ($cookie as $key => $value) {
			$chitietsanpham = $this->sanpham->getchitietsanpham($key);
			$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($key);
			$hinhanh = $this->hinhanh->getchitiethinhanh($chitietsanpham[0]['IDHinhAnh']);
			$chitietnhathuoc = $this->nhathuoc->getchitietnhathuoc($chitietsanpham[0]['IDNhaThuoc']);
			$phantu = array('IDSanPham'=>$key, 'SoLuong'=>$value, 'TenSanPham'=>$chitietsanpham[0]['TenSanPham'], 'TenNhaThuoc'=>$chitietnhathuoc[0]['TenNhaThuoc'], 'HinhAnh'=>$hinhanh[0]['HinhAnh'], 'Gia'=>$giasanphammoinhat[0]['Gia'], 'SoTien'=>$giasanphammoinhat[0]['Gia']*$value);
			array_push($giohang,$phantu);
			$sosanpham++;
			$tongsoluong += $value;
			$tongtien += $giasanphammoinhat[0]['Gia']*$value;
		};
		$data = array('GioHang'=>$giohang, 'SoSanPham'=>$sosanpham, 'TongSoLuong'=>$tongsoluong, 'TongTien'=>$tongtien);
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'home_thanhtoan_view', $data);
	}

	public function getthanhtoankhinhan()
	{
		$data = array();
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'home_thanhtoankhinhan', $data);
	}
	public function xacnhanthanhtoankhinhan()
	{
		if(isset($_SESSION['user_id'])){
			$testdata = array();
			$TenNguoiMua = $_POST['TenNguoiMua'];
			$SDT = $_POST['SDT'];
			$DiaChi = $_POST['DiaChi'];
			$ToaDo = $_POST['ToaDo'];
	
			$data = array();
			$cookie = $_COOKIE;
			
			// var_dump($Amount);die();
			$datacot 	=		array('TenNguoiMua', 'SDT', 'DiaChi', 'ToaDo', 'NgayDatHang', 'GiaoHang');
			$datainsert =		array($TenNguoiMua, $SDT, $DiaChi, $ToaDo, date("Y-m-d"), 0);
			$rs = $this->hoadonxuat->insert_base('hoadonxuathang',$datacot,$datainsert);
			if($rs['status']){
				if($cookie){
					$idhoadonxuat = ($this->hoadonxuat->getmaxhoadonxuat())[0]['MAX(IDHoaDonXuatHang)'];
					foreach ($cookie as $key => $value) {
						$datacotchitiethoadon 	=		array('IDHoaDonXuatHang', 'IDSanPham', 'SoLuong', 'IDNguoiDung');
						$datainsertchitiethoadon =		array($idhoadonxuat, $key, $value, $_SESSION['user_id']);
						$resuls = $this->chitiethoadonxuat->insert_base('chitiethoadonxuathang',$datacotchitiethoadon,$datainsertchitiethoadon);
						if($resuls){
							echo '<script> document.cookie = '.$key.' + "=" + 0 + ";" + "expires=Sun, 02 May 2000 15:01:25 GMT" + ";path=/";</script>';
						}
					};
				}else{}
				$this->phpAlert("Thanh toán thành công!!");
			}
			else{
				$this->phpAlert("Thanh toán thất bại do dữ liệu!");
			}
			$data = array();
			$routeView = new Route();
			$routeView->view('sanpham', 'home_view', $data);
		}else{}
	}
	public function getthanhtoanpaypal()
	{
		// $cookie = $_COOKIE;
		// unset($cookie['PHPSESSID']);
		// unset($cookie['sidenav-state']);
		// $danhsachnhathuoc = array();
		// foreach ($cookie as $key => $value) {
		// 	$chitietsanpham = $this->sanpham->getchitietsanpham($key);
		// 	$idnhathuoc = NULL;
		// 	if(array_search($chitietsanpham[0]['IDNhaThuoc'],$danhsachnhathuoc)){
		// 		$danhsachnhathuoc = array('IDSanPham'=>$key, 'SoLuong'=>$value, 'TenSanPham'=>$chitietsanpham[0]['TenSanPham'], 'TenNhaThuoc'=>$chitietnhathuoc[0]['TenNhaThuoc'], 'HinhAnh'=>$hinhanh[0]['HinhAnh'], 'Gia'=>$giasanphammoinhat[0]['Gia'], 'SoTien'=>$giasanphammoinhat[0]['Gia']*$value);
		// 	}else if($idnhathuoc != $chitietsanpham[0]['IDNhaThuoc']){

		// 	}
		// };
		$tongtien = $_GET['tongtien'];
		$data = array("TongTien"=>$tongtien);
        $routeView = new Route();
        $routeView->view('hoadonxuat', 'home_thanhtoanpaypal', $data);
	}
	public function xacnhanthanhtoanpaypal()
	{
		if(isset($_SESSION['user_id'])){
			$testdata = array();
			$IDHoaDonPayPal = $_POST['IDHoaDonPayPal'];
			$Intent = $_POST['Intent'];
			$Status = $_POST['Status'];
			$Amount = $_POST['Amount'];
			$CurrencyCode = $_POST['CurrencyCode'];
			$MerchantId = $_POST['MerchantId'];
			$PayeeEmail = $_POST['PayeeEmail'];
			$PayerId = $_POST['PayerId'];
			$PayerName = $_POST['PayerName'];
			$AddressLine1 = $_POST['AddressLine1'];
			$AddressLine2 = $_POST['AddressLine2'];
			$AdminArea2 = $_POST['AdminArea2'];
			$AdminArea1 = $_POST['AdminArea1'];
			$PostalCode = $_POST['PostalCode'];
			$CountryCode = $_POST['CountryCode'];
			$PayerEmail = $_POST['PayerEmail'];
			$CreateTime = $_POST['CreateTime'];
	
			$data = array();
			$cookie = $_COOKIE;
			
			$datacot 	=		array('IDHoaDonPayPal', 'Intent', 'Status', 'Amount', 'CurrencyCode', 'MerchantId', 'PayeeEmail', 'PayerId', 'PayerName', 'AddressLine1', 'AddressLine2', 'AdminArea2', 'AdminArea1', 'PostalCode', 'CountryCode', 'PayerEmail', 'CreateTime', 'GiaoHang');
			$datainsert =		array($IDHoaDonPayPal, $Intent, $Status, $Amount, $CurrencyCode, $MerchantId, $PayeeEmail, $PayerId, $PayerName, $AddressLine1, $AddressLine2, $AdminArea2, $AdminArea1, $PostalCode, $CountryCode, $PayerEmail, $CreateTime, 0);
			$rs = $this->hoadonxuat->insert_base('hoadonpaypal',$datacot,$datainsert);
			if($rs['status']){
				if($cookie){
					foreach ($cookie as $key => $value) {
						$datacotchitiethoadon 	=		array('IDHoaDonPayPal', 'IDSanPham', 'SoLuong', 'IDNguoiDung');
						$datainsertchitiethoadon =		array($IDHoaDonPayPal, $key, $value, $_SESSION['user_id']);
						$resuls = $this->chitiethoadonxuat->insert_base('chitiethoadonxuathang',$datacotchitiethoadon,$datainsertchitiethoadon);
						if($resuls){
							echo '<script> document.cookie = '.$key.' + "=" + 0 + ";" + "expires=Sun, 02 May 2000 15:01:25 GMT" + ";path=/";</script>';
						}
					};
				}else{}
				$this->phpAlert("Thanh toán thành công!!");
			}
			else{
				$this->phpAlert("Thanh toán thất bại do dữ liệu!");
			}
			$data = array();
			$routeView = new Route();
			$routeView->view('sanpham', 'home_view', $data);
		}else{}
	}
}
?>