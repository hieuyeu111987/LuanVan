<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class choadonnhap extends cbase
{
    protected $hoadonnhap;
	protected $congtyduoc;
    protected $chitiethoadonnhap;
    protected $sanpham;
    function __construct() {
	   $this->hoadonnhap = parent::setModel('mhoadonnhap', $this->hoadonnhap);
	   $this->congtyduoc = parent::setModel('mcongtyduoc', $this->congtyduoc);
       $this->chitiethoadonnhap = parent::setModel('mchitiethoadonnhap', $this->chitiethoadonnhap);
       $this->sanpham = parent::setModel('msanpham', $this->sanpham);
	}
	//Function using to get list data
	public function gethoadonnhap()
	{
		$data = $this->hoadonnhap->gethoadonnhap();
		for($i = 0; $i < count($data); $i++) {
			if(isset($data[$i]['IDCongTyDuoc'])){
				$congtyduoc = $this->congtyduoc->getchitietcongtyduoc($data[$i]['IDCongTyDuoc']);
				$data[$i]['TenCongTyDuoc'] = $congtyduoc[0]['TenCongTyDuoc'];
			}else{
				$data[$i]['TenCongTyDuoc'] = NULL;
			}
		}
        $routeView = new Route();
        $routeView->view('hoadonnhap', 'hoadonnhap_view', $data);
	}
    public function getchitiethoadonnhap($id = null)
	{
		$idhoadonnhap = null;
		if($id){
			$idhoadonnhap = $id;
		}else{
			$idhoadonnhap = $_GET["idhoadonnhap"];
		}
        $hoadonnhap = $this->hoadonnhap->getchitiethoadonnhap($idhoadonnhap);
        $chitiethoadonnhap = $this->chitiethoadonnhap->getchitiethoadonnhap($idhoadonnhap);
		$congtyduoc = $this->congtyduoc->getcongtyduoc();
		
		for($i = 0; $i < count($hoadonnhap); $i++) {
			if(isset($hoadonnhap[$i]['IDCongTyDuoc'])){
				$chitietcongtyduoc = $this->congtyduoc->getchitietcongtyduoc($hoadonnhap[$i]['IDCongTyDuoc']);
				$hoadonnhap[$i]['TenCongTyDuoc'] = $chitietcongtyduoc[0]['TenCongTyDuoc'];
			}else{
				$hoadonnhap[$i]['TenCongTyDuoc'] = NULL;
			}
		}
        for($i = 0; $i < count($chitiethoadonnhap); $i++) {
			if(isset($chitiethoadonnhap[$i]['IDCongTyDuoc'])){
				$sanpham = $this->sanpham->getchitietsanpham($chitiethoadonnhap[$i]['IDSanPham']);
				$chitiethoadonnhap[$i]['TenSanPham'] = $sanpham[0]['TenSanPham'];
			}else{
				$chitiethoadonnhap[$i]['TenSanPham'] = NULL;
			}
		}
		for($i = 0; $i < count($congtyduoc); $i++) {
			if($congtyduoc[$i]['IDCongTyDuoc'] == $hoadonnhap[0]['IDCongTyDuoc']){
				unset($congtyduoc[$i]);
			}
		}
        $data = array("hoadonnhap"=>$hoadonnhap, "chitiethoadonnhap"=>$chitiethoadonnhap, "congtyduoc"=>$congtyduoc);
		// var_dump($data['hoadonnhap'][0]);die();
        $routeView = new Route();
        $routeView->view('hoadonnhap', 'hoadonnhap_edit', $data);
	}
	public function getviewchitiethoadonnhap($id = null)
	{
		$idhoadonnhap = null;
		if($id){
			$idhoadonnhap = $id;
		}else{
			$idhoadonnhap = $_POST['idhoadonnhap'];
		}
		$chitiethoadonnhap = $this->chitiethoadonnhap->getchitiethoadonnhap($idhoadonnhap);
		$sanpham = $this->sanpham->getsanphamtomanage();
		for($i = 0; $i < count($chitiethoadonnhap); $i++) {
			if(isset($chitiethoadonnhap[$i]['IDSanPham'])){
				$sanpham = $this->sanpham->getchitietsanpham($chitiethoadonnhap[$i]['IDSanPham']);
				$chitiethoadonnhap[$i]['TenSanPham'] = $sanpham[0]['TenSanPham'];
			}else{
				$chitiethoadonnhap[$i]['TenSanPham'] = NULL;
			}
		}
        $routeView = new Route();
		$data = array("chitiethoadonnhap"=>$chitiethoadonnhap, "sanpham"=>$sanpham, "idhoadonnhap"=>$idhoadonnhap);
        $routeView->view('chitiethoadonnhap', 'chitiethoadonnhap_view', $data);
	}
	
	public function addhoadonnhap(){
		$data = $this->congtyduoc->getcongtyduoc();
		$routeView = new Route();
		$routeView->view('hoadonnhap', 'hoadonnhap_add', $data);
    }
	public function addchitiethoadonnhap()
	{
		$idhoadonnhap = $_GET['idhoadonnhap'];
		$sanpham = $this->sanpham->getsanphamtomanage();
        $routeView = new Route();
		$data = array("sanpham"=>$sanpham, "idhoadonnhap"=>$idhoadonnhap);
        $routeView->view('chitiethoadonnhap', 'chitiethoadonnhap_add', $data);
	}
	public function editchitiethoadonnhap()
	{
		$idhoadonnhap = $_GET['idhoadonnhap'];
		$chitiethoadonnhap = $this->chitiethoadonnhap->getchitietchitiethoadonnhap($idhoadonnhap);
		$sanpham = $this->sanpham->getsanphamtomanage();
		for($i = 0; $i < count($chitiethoadonnhap); $i++) {
			if(isset($chitiethoadonnhap[$i]['IDSanPham'])){
				$chitietsanpham = $this->sanpham->getchitietsanpham($chitiethoadonnhap[$i]['IDSanPham']);
				$chitiethoadonnhap[$i]['TenSanPham'] = $chitietsanpham[0]['TenSanPham'];
			}else{
				$chitiethoadonnhap[$i]['TenSanPham'] = NULL;
			}
		}
		for($i = 0; $i < count($sanpham); $i++) {
			if($sanpham[$i]['IDSanPham'] == $chitiethoadonnhap[0]['IDSanPham']){
				unset($sanpham[$i]);
			}
		}
        $routeView = new Route();
		$data = array("chitiethoadonnhap"=>$chitiethoadonnhap, "sanpham"=>$sanpham);
		$routeView->view('chitiethoadonnhap', 'chitiethoadonnhap_edit', $data);
	}
	public function doaddhoadonnhap(){
		$tencongtyduoc = $_POST["tencongtyduoc"];
		$ngaythanhtoan = $_POST["ngaythanhtoan"];
		$idnhathuoc = $_SESSION['idnhathuoc'];
        $datacot 	=		array('NgayThanhToan', 'IDCongTyDuoc', 'IDNhaThuoc');
		$datainsert =		array($ngaythanhtoan, $tencongtyduoc, $idnhathuoc);
		$rs = $this->hoadonnhap->insert_base('hoadonnhaphang',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm hóa đơn thành công, Bạn cần thêm sản phẩm vào hóa đơn!");
			$idhoadonnhap = ($this->hoadonnhap->getmaxhoadonnhap())[0]['MAX(IDHoaDonNhapHang)'];
			$this->getchitiethoadonnhap($idhoadonnhap);
		}
		else{
			$this->phpAlert("Thêm hóa đơn thất bại do dữ liệu!");
		}
    }
    public function doaddchitiethoadonnhap(){
		$idsanpham = $_POST["tensanpham"];
		$soluong = $_POST["soluong"];
		$gia = $_POST["gia"];
		$donvi = $_POST["donvi"];
		$idhoadonnhap = $_POST["idhoadonnhap"];
        $datacot 	=		array('SoLuong', 'Gia', 'DonVi', 'IDSanPham', 'IDHoaDonNhapHang');
		$datainsert =		array($soluong, $gia, $donvi, $idsanpham, $idhoadonnhap);
		$rs = $this->chitiethoadonnhap->insert_base('chitiethoadonnhaphang',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm sản phẩm vào hóa đơn thành công!!");
			$this->getviewchitiethoadonnhap();
		}
		else{
			$this->phpAlert("Thêm sản phẩm vào hóa đơn thất bại do dữ liệu!!");
		}
    }
	public function doeditchitiethoadonnhap(){
		$idsanpham = $_POST["tensanpham"];
		$soluong = $_POST["soluong"];
		$gia = $_POST["gia"];
		$donvi = $_POST["donvi"];
		$idhoadonnhap = $_POST["idhoadonnhap"];
		$idchitiethoadonnhap = $_POST["idchitiethoadonnhap"];
        $datacot 	=		array('SoLuong', 'Gia', 'DonVi', 'IDSanPham');
		$datainsert =		array($soluong, $gia, $donvi, $idsanpham);
		$rs = $this->chitiethoadonnhap->update_base('chitiethoadonnhaphang',$datacot,$datainsert,"IDChiTietHoaDonNhapHang = ".$idchitiethoadonnhap);
		if($rs['status']){
			$this->phpAlert("Thay đổi thông tin  hóa đơn thành công!!");
			$this->getviewchitiethoadonnhap();
		}
		else{
			$this->phpAlert("Thêm đổi thông tin hóa đơn thất bại do dữ liệu!!");
		}
    }
    public function doedithoadonnhap(){
        $idhoadonnhap = $_POST["idhoadonnhap"];
		$ngaythanhtoan = $_POST["ngaythanhtoan"];
		$tencongtyduoc = $_POST["tencongtyduoc"];
        $datacot 	=		array('IDCongTyDuoc', 'NgayThanhToan');
		$datainsert =		array($tencongtyduoc, $ngaythanhtoan);
		$rs = $this->hoadonnhap->update_base('hoadonnhaphang',$datacot,$datainsert,"IDHoaDonNhapHang = ".$idhoadonnhap);
		if($rs['status']){
			$this->phpAlert("Sửa thông tin hóa đơn thành công!!");
			$this->gethoadonnhap();
		}
		else{
			$this->phpAlert("Sửa thông tin hóa đơn thất bại do dữ liệu!!");
		}
    }
    public function deletehoadonnhap(){
		$idhoadonnhap = $_GET["idhoadonnhap"];
		$rs = $this->hoadonnhap->delete_base('hoadonnhaphang',"IDHoaDonNhapHang = ".$idhoadonnhap);
		if($rs['status']){
			$this->phpAlert("Xóa hóa đơn thành công!!");
			$this->gethoadonnhap();
		}
		else{
			$this->phpAlert("Xóa hóa đơn thất bại do dữ liệu!!");
		}
	}
	public function deletechitiethoadonnhap(){
		$idchitiethoadonnhap = $_POST["idchitiethoadonnhap"];
		$idhoadonnhap = $_POST["idhoadonnhap"];
		$rs = $this->chitiethoadonnhap->delete_base('chitiethoadonnhaphang',"IDChiTietHoaDonNhapHang = ".$idchitiethoadonnhap);
		if($rs['status']){
			$this->phpAlert("Xóa sản phẩm khỏi hóa đơn thành công!!");
			$this->getviewchitiethoadonnhap();
		}
		else{
			$this->phpAlert("Xóa sản phẩm khỏi hóa đơn thất bại do dữ liệu!!");
		}
	}
}
?>