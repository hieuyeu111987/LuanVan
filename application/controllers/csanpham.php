<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';

class csanpham extends cbase
{
    protected $sanpham;
	protected $hinhanh;
	protected $danhmuctongquat;
	protected $danhmucnhathuoc;
	protected $giasanpham;
	protected $giamgiasanpham;
	protected $yeuthich;
	protected $luotchon;
	protected $nguoidung;
	protected $nhathuoc;
	protected $hoadonnhaphang;
	protected $hoadonxuathang;
	protected $danhgia;
    function __construct() {
	   $this->sanpham = parent::setModel('msanpham', $this->sanpham);
	   $this->hinhanh = parent::setModel('mhinhanh', $this->hinhanh);
	   $this->danhmucnhathuoc = parent::setModel('mdanhmucnhathuoc', $this->danhmucnhathuoc);
	   $this->danhmuctongquat = parent::setModel('mdanhmuctongquat', $this->danhmuctongquat);
	   $this->giasanpham = parent::setModel('mgiasanpham', $this->giasanpham);
	   $this->giamgiasanpham = parent::setModel('mgiamgiasanpham', $this->giamgiasanpham);
	   $this->yeuthich = parent::setModel('myeuthich', $this->yeuthich);
	   $this->luotchon = parent::setModel('mluotchon', $this->luotchon);
	   $this->nguoidung = parent::setModel('mnguoidung', $this->nguoidung);
	   $this->nhathuoc = parent::setModel('mnhathuoc', $this->nhathuoc);
	   $this->hoadonnhaphang = parent::setModel('mchitiethoadonnhap', $this->hoadonnhaphang);
	   $this->hoadonxuathang = parent::setModel('mchitiethoadonxuat', $this->hoadonxuathang);
	   $this->danhgia = parent::setModel('mdanhgia', $this->danhgia);
	}
	//Function using to get list data
	public function gethomeview()
	{
		$data = array();
        $routeView = new Route();
        $routeView->view('sanpham', 'home_view', $data);
	}
	public function getsanphamtomanage()
	{
		$data = $this->sanpham->getsanphamtomanage();
		for($i = 0; $i < count($data); $i++) {
			if(isset($data[$i]['IDHinhAnh'])){
				$hinhanh = $this->hinhanh->getchitiethinhanh($data[$i]['IDHinhAnh']);
				$data[$i]['IDHinhAnh'] = $hinhanh[0]['HinhAnh'];
			}else{
				$data[$i]['IDHinhAnh'] = NULL;
			}
		}
		for($i = 0; $i < count($data); $i++) {
			if(isset($data[$i]['IDDanhMucNhaThuoc'])){
				$danhmucnhathuoc = $this->danhmucnhathuoc->getchitietdanhmucnhathuoc($data[$i]['IDDanhMucNhaThuoc']);
				$data[$i]['IDDanhMucNhaThuoc'] = $danhmucnhathuoc[0]['TenDanhMucNhaThuoc'];
			}else{
				$data[$i]['IDDanhMucNhaThuoc'] = NULL;
			}
		}
        $routeView = new Route();
        $routeView->view('sanpham', 'manage_sanpham_view', $data);
	}
	public function getsanphamtohome()
	{
		$data = $this->danhmuctongquat->getdanhmuctongquat();
		$routeView = new Route();
        $routeView->view('sanpham', 'home_sanpham_view', $data);
	}
	public function getitemtohome()
	{
		$soluong = $_GET['soluong'];
		$maxsoluong = 0;
		$sanphamtohome;
		if(isset($_GET['tukhoa'])){
			$sanphamtohome = $this->sanpham->gettimkiemsanphamtohome($_GET['tukhoa']);
		}else if(isset($_GET['iddanhmuctongquat'])){
			$sanphamtohome = $this->sanpham->gettimkiemsanphamtohomebydanhmuctongquat($_GET['iddanhmuctongquat']);
		}else{
			$sanphamtohome = $this->sanpham->getsanphamtohome();
		}
		foreach($sanphamtohome as $key => $value){
			// if(isset($value['IDSanPham'])){
				$chitiethoadonnhap = $this->hoadonnhaphang->getsoluongnhapbysanpham($value['IDSanPham']);
				$chitiethoadonxuat = $this->hoadonxuathang->getsoluongxuatbysanpham($value['IDSanPham']);
				if((int)$chitiethoadonnhap[0]['SoLuong'] <= (int)$chitiethoadonxuat[0]['SoLuong'] || !$chitiethoadonnhap[0]['SoLuong']){
					unset($sanphamtohome[$key]);
				}else{}
			// }else{}
		}
		for($i = 0; $i < count($sanphamtohome); $i++) {
			if(isset($sanphamtohome[$i]['IDHinhAnh'])){
				$hinhanh = $this->hinhanh->getchitiethinhanh($sanphamtohome[$i]['IDHinhAnh']);
				$sanphamtohome[$i]['HinhAnh'] = $hinhanh[0]['HinhAnh'];
			}else{
				$sanphamtohome[$i]['HinhAnh'] = NULL;
			}
			if(isset($sanphamtohome[$i]['IDSanPham'])){
				$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($sanphamtohome[$i]['IDSanPham']);
				$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($sanphamtohome[$i]['IDSanPham']);
				if($giasanphammoinhat){
					$sanphamtohome[$i]['Gia'] = $giasanphammoinhat[0]['Gia'];
					$sanphamtohome[$i]['DonVi'] = $giasanphammoinhat[0]['DonVi'];
					$sanphamtohome[$i]['NgayCapNhat'] = $giasanphammoinhat[0]['NgayCapNhat'];
				}else{
					$sanphamtohome[$i]['Gia'] = NULL;
					$sanphamtohome[$i]['DonVi'] = NULL;
					$sanphamtohome[$i]['NgayCapNhat'] = NULL;
				}
				if($giamgiasanphamhientai){
					$sanphamtohome[$i]['GiaGiam'] = $giamgiasanphamhientai[0]['Gia'];
					$sanphamtohome[$i]['NgayBatDau'] = $giamgiasanphamhientai[0]['NgayKetThuc'];
					$sanphamtohome[$i]['NgayKetThuc'] = $giamgiasanphamhientai[0]['NgayBatDau'];
				}else{
					$sanphamtohome[$i]['GiaGiam'] = NULL;
					$sanphamtohome[$i]['NgayBatDau'] = NULL;
					$sanphamtohome[$i]['NgayKetThuc'] = NULL;
				}
			}else{
				$sanphamtohome[$i]['Gia'] = NULL;
				$sanphamtohome[$i]['DonVi'] = NULL;
				$sanphamtohome[$i]['NgayCapNhat'] = NULL;
				$sanphamtohome[$i]['GiaGiam'] = NULL;
				$sanphamtohome[$i]['NgayBatDau'] = NULL;
				$sanphamtohome[$i]['NgayKetThuc'] = NULL;
			}

			
		}
		if($soluong >= count($sanphamtohome)){
			$soluong = count($sanphamtohome);
			$maxsoluong = 1;
		}else{
			$maxsoluong = 0;
		}
		$data = array('sanpham'=>$sanphamtohome, 'soluong'=>$soluong, 'maxsoluong'=>$maxsoluong);
		$routeView = new Route();
        $routeView->view('sanpham', 'home_item_view', $data);
	}
	public function getoptiondanhmucnhathuoctohome()
	{
		$iddanhmuctongquat = $_GET['iddanhmuctongquat'];
		$data = $this->danhmucnhathuoc->getdanhmucnhathuocbydanhmuctongquat($iddanhmuctongquat);
		$routeView = new Route();
        $routeView->view('danhmucnhathuoc', 'danhmucnhathuoc_option', $data);
	}
    public function getchitietsanpham($id = NULL)
	{
		$idsanpham;
		if($id == NULL){
			$idsanpham = $_GET["idsanpham"];
		}else{
			$idsanpham = $id;
		}
		$sanpham = $this->sanpham->getchitietsanpham($idsanpham);
		$giasanpham = $this->giasanpham->getgiabysanpham($idsanpham);
		$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($idsanpham);
		$giamgiasanpham = $this->giamgiasanpham->getgiamgiasanpham($idsanpham);
		$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($idsanpham);
		$danhmucnhathuoc = $this->danhmucnhathuoc->getdanhmucnhathuoc();
		$hinhanh = $this->hinhanh->gethinhanh();
		if(isset($sanpham[0]['IDHinhAnh'])){
			$chitiethinhanh = $this->hinhanh->getchitiethinhanh($sanpham[0]['IDHinhAnh']);
			$sanpham[0]['HinhAnh'] = $chitiethinhanh[0]['HinhAnh'];
		}else{
			$sanpham[0]['HinhAnh'] = NULL;
		}
		if($giasanphammoinhat){
			$sanpham[0]['Gia'] = $giasanphammoinhat[0]['Gia'];
			$sanpham[0]['DonVi'] = $giasanphammoinhat[0]['DonVi'];
			$sanpham[0]['NgayCapNhat'] = $giasanphammoinhat[0]['NgayCapNhat'];
		}else{
			$sanpham[0]['Gia'] = NULL;
			$sanpham[0]['DonVi'] = NULL;
			$sanpham[0]['NgayCapNhat'] = NULL;
		}
		if($giamgiasanphamhientai){
			$sanpham[0]['GiaGiam'] = $giamgiasanphamhientai[0]['Gia'];
			$sanpham[0]['NgayBatDau'] = $giamgiasanphamhientai[0]['NgayBatDau'];
			$sanpham[0]['NgayKetThuc'] = $giamgiasanphamhientai[0]['NgayKetThuc'];
		}else{
			$sanpham[0]['GiaGiam'] = NULL;
			$sanpham[0]['NgayBatDau'] = NULL;
			$sanpham[0]['NgayKetThuc'] = NULL;
		}
		$data = array('sanpham'=>$sanpham, 'danhmucnhathuoc'=>$danhmucnhathuoc, 'hinhanh'=>$hinhanh, 'giasanpham'=>$giasanpham, 'giamgiasanpham'=>$giamgiasanpham);
        $routeView = new Route();
        $routeView->view('sanpham', 'sanpham_edit', $data);
	}
	public function getchitietsanphamtohome($id = NULL)
	{
		$idsanpham;
		if($id == NULL){
			$idsanpham = $_GET["idsanpham"];
		}else{
			$idsanpham = $id;
		}
		
		$sanpham = $this->sanpham->getchitietsanpham($idsanpham);
		$nhathuoc = $this->nhathuoc->getchitietnhathuoc($sanpham[0]['IDNhaThuoc']);
		$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($idsanpham);
		$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($idsanpham);
		$luotthich = $this->yeuthich->getluotthich($idsanpham);
		if(isset($sanpham[0]['IDHinhAnh'])){
			$chitiethinhanh = $this->hinhanh->getchitiethinhanh($sanpham[0]['IDHinhAnh']);
			$sanpham[0]['HinhAnh'] = $chitiethinhanh[0]['HinhAnh'];
		}else{
			$sanpham[0]['HinhAnh'] = NULL;
		}

		if(isset($sanpham[0]['IDDanhMucNhaThuoc'])){
			$chitietdanhmucnhathuoc = $this->danhmucnhathuoc->getchitietdanhmucnhathuoc($sanpham[0]['IDDanhMucNhaThuoc']);
			$sanpham[0]['TenDanhMucNhaThuoc'] = $chitietdanhmucnhathuoc[0]['TenDanhMucNhaThuoc'];
			if(isset($chitietdanhmucnhathuoc[0]['IDDanhMucTongQuat'])){
				$chitietdanhmuctongquat = $this->danhmuctongquat->getchitietdanhmuctongquat($chitietdanhmucnhathuoc[0]['IDDanhMucTongQuat']);
				$sanpham[0]['TenDanhMucTongQuat'] = $chitietdanhmuctongquat[0]['TenDanhMucTongQuat'];
			}else{
				$sanpham[0]['TenDanhMucTongQuat'] = NULL;
			}
		}else{
			$sanpham[0]['TenDanhMucNhaThuoc'] = NULL;
		}

		if($giasanphammoinhat){
			$sanpham[0]['Gia'] = $giasanphammoinhat[0]['Gia'];
			$sanpham[0]['DonVi'] = $giasanphammoinhat[0]['DonVi'];
		}else{
			$sanpham[0]['Gia'] = NULL;
			$sanpham[0]['DonVi'] = NULL;
		}
		if($giamgiasanphamhientai){
			$sanpham[0]['GiaGiam'] = $giamgiasanphamhientai[0]['Gia'];
		}else{
			$sanpham[0]['GiaGiam'] = NULL;
		}
		if($luotthich){
			$sanpham[0]['LuotThich'] = $luotthich[0]['COUNT(IDYeuThich)'];
			if(isset($_SESSION['user_id'])){
				$dathich = $this->yeuthich->kiemtrayeuthich($idsanpham, $_SESSION['user_id']);
				if($dathich){
					$sanpham[0]['DaThich'] = TRUE;
				}else{
					$sanpham[0]['DaThich'] = FALSE;
				}
			}else{
				$sanpham[0]['DaThich'] = FALSE;
			}
		}else{
			$sanpham[0]['LuotThich'] = 0;
		}
		if(isset($_SESSION['user_id'])){
			$luotchon = $this->luotchon->getluotchon($_SESSION['user_id'], $idsanpham);
			if($luotchon){
				$datacot 	=		array('SoLanChon');
				$datainsert =		array($luotchon[0]['SoLanChon'] + 1);
				$rs = $this->sanpham->update_base('luotchon',$datacot,$datainsert,"IDLuotChon = ".$luotchon[0]['IDLuotChon']);
			}else{
				$datacot 	=		array('IDNguoiDung', 'IDSanPham', 'SoLanChon');
				$datainsert =		array($_SESSION['user_id'], $idsanpham, 1);
				$rs = $this->luotchon->insert_base('luotchon',$datacot,$datainsert);
			}
		}else{}

		$chitiethoadonnhap = $this->hoadonnhaphang->getsoluongnhapbysanpham($idsanpham);
		$chitiethoadonxuat = $this->hoadonxuathang->getsoluongxuatbysanpham($idsanpham);
		$sanpham[0]['SoLuongNhap'] = $chitiethoadonnhap[0]['SoLuong'];
		$sanpham[0]['SoLuongXuat'] = $chitiethoadonxuat[0]['SoLuong'];
		$tongsoluongnhap = $this->hoadonnhaphang->getsoluongnhapbynhathuoc($sanpham[0]['IDNhaThuoc']);
		$tongsoluongxuat = $this->hoadonxuathang->getsoluongxuatbynhathuoc($sanpham[0]['IDNhaThuoc']);
		$nhathuoc[0]['SoLuongNhapCuaNhaThuoc'] = $tongsoluongnhap[0]['SoLuong'];
		$nhathuoc[0]['SoLuongXuatCuaNhaThuoc'] = $tongsoluongxuat[0]['SoLuong'];
		$TongDanhGia = $this->danhgia->gettrungbinhdanhgiabysanpham($idsanpham);
		$sanpham[0]['SoLuotDanhGia'] = $TongDanhGia[0]['SoLuotDanhGia'];
		$sanpham[0]['TongSoSao'] = $TongDanhGia[0]['TongSoSao'];

		$cookie = $_COOKIE;
		unset($cookie['PHPSESSID']);
		unset($cookie['sidenav-state']);
		$idnhathuocdaco = NULL;
		if($cookie){
			foreach ($cookie as $key => $value) {
				$chitietsanpham = $this->sanpham->getchitietsanpham($key);
				$idnhathuocdaco = $chitietsanpham[0]['IDNhaThuoc'];
			};
		}
		$data = array('sanpham'=>$sanpham,'nhathuoc'=>$nhathuoc, 'idnhathuochientai'=>$idnhathuocdaco);
        $routeView = new Route();
        $routeView->view('sanpham', 'home_sanpham_detail', $data);
	}

	public function thichsanpham(){
		$idsanpham = $_GET["idsanpham"];
		$idnguoidung = $_GET["idnguoidung"];
        $idyeuthich = $this->yeuthich->kiemtrayeuthich($idsanpham, $idnguoidung);
		if($idyeuthich){
			$this->yeuthich->delete_base('yeuthich',"IDYeuThich = ".$idyeuthich[0]['IDYeuThich']);
		}else{
			$datacot 	=		array('IDNguoiDung', 'IDSanPham');
			$datainsert =		array($idnguoidung, $idsanpham);
			$this->yeuthich->insert_base('yeuthich',$datacot,$datainsert);
		}
        
		$this->getchitietsanphamtohome($idsanpham);
    }

	// Gợi ý theo lượt click
	public function getgoiysanpham()
	{
		$data = array();
		if(isset($_SESSION['user_id'])){
			$tapdulieugoiy = array();
			$trungbinhuser = array();
			$hieuluotchonvagiatritrungbinh = array();
			$dotuongdong = array();
			$dotuongdongcaonhat = -99;
			$idnguoidungtuongdong = NULL;
			$tapgoiy = array();
			$sanpham = $this->sanpham->getsanphamtohome();
			$nguoidung = $this->nguoidung->getnguoidung();
			// Lập bảng giá trị ma trận của các lượt chọn
			for ($i=0; $i < count($nguoidung) ; $i++) {
				$nguoichon = array();
				for ($j=0; $j < count($sanpham) ; $j++) {
					$luotchon = $this->luotchon->getluotchon($nguoidung[$i]['IDNguoiDung'], $sanpham[$j]['IDSanPham']);
					
					if($luotchon){
						$nguoichon[$sanpham[$j]['IDSanPham']] = $luotchon[0]['SoLanChon'];
					}else{
						$nguoichon[$sanpham[$j]['IDSanPham']] = 0;
					}
				}
				$tapdulieugoiy[$nguoidung[$i]['IDNguoiDung']] = $nguoichon;
			}

			// Xác định vị trí => row
			foreach ($tapdulieugoiy as $user => $row) {
				
				// Tính trung bình giá trị theo từng user
				$tongcacluocchon = 0;
				$sophantucogiatri = 0;
				foreach($row as $j){
					if($j){
						$tongcacluocchon += $j;
						$sophantucogiatri++;
					}else{}
				}
				// Lấy từng lượt chọn trừ đi trung bình của nó
				$nguoichon = array();
				foreach ($row as $sanpham1 => $collum) {
					if($collum == 0){
						$nguoichon[$sanpham1] = 0;
					}else if($sophantucogiatri != 0){
						$nguoichon[$sanpham1] = $collum - ($tongcacluocchon/$sophantucogiatri);
					}else{}
				}
				if($sophantucogiatri != 0){
					$trungbinhuser[$user] = $tongcacluocchon/$sophantucogiatri;
				}else{}
				$hieuluotchonvagiatritrungbinh[$user] = $nguoichon;
				
			}

			// Tính độ tương đồng của 2 user
			foreach ($hieuluotchonvagiatritrungbinh as $nguoidung1 => $row) {
				if($nguoidung1 != $_SESSION['user_id']){
					$tu = 0;
					$mau = 0;
					foreach ($row as $sanpham1 => $collum) {
						if($row[$sanpham1] != NULL && $_SESSION['user_id'] != NULL){
							$tu += $row[$sanpham1]*$hieuluotchonvagiatritrungbinh[$_SESSION['user_id']][$sanpham1];
							$mau += sqrt($row[$sanpham1]*$row[$sanpham1])*sqrt($hieuluotchonvagiatritrungbinh[$_SESSION['user_id']][$sanpham1]*$hieuluotchonvagiatritrungbinh[$_SESSION['user_id']][$sanpham1]);
							
						}
					}
					
					
					if($mau != 0){
						$dotuongdong[$nguoidung1] = $tu/$mau;
					}else{
						$dotuongdong[$nguoidung1] = NULL;
					}
				}else{}
			}
			//Tìm người tương đồng nhất
			foreach ($dotuongdong as $nguoidung1 => $row) {
				if($row != NULL){
					if($dotuongdongcaonhat < $row){
						$dotuongdongcaonhat = $row;
						$idnguoidungtuongdong = $nguoidung1;
					}else{}
				}
			}

			//Gợi ý cho từng sản phẩm
			if($idnguoidungtuongdong != NULL && $dotuongdongcaonhat != 0 ){
				foreach ($sanpham as $row) {
					
					$goiyluotchon = NULL;
					if($tapdulieugoiy[$_SESSION['user_id']][$row['IDSanPham']] == NULL && $tapdulieugoiy[$idnguoidungtuongdong][$row['IDSanPham']] != NULL){
						$goiyluotchon = $trungbinhuser[$_SESSION['user_id']] + (( $dotuongdongcaonhat * ( $tapdulieugoiy[$idnguoidungtuongdong][$row['IDSanPham']] - $trungbinhuser[$idnguoidungtuongdong] ) )/(sqrt($dotuongdongcaonhat*$dotuongdongcaonhat)));
					}
					$tapgoiy[$row['IDSanPham']] = $goiyluotchon;
				}
			}else{}
			var_dump($tapgoiy);die();

			// Lấy thông tin những sản phẩm được gợi ý
			foreach ($tapgoiy as $idsanpham => $row) {
				if($row != NULL && $row > 0){
					$chitietsanpham = $this->sanpham->getchitietsanpham($idsanpham)[0];
					if(isset($chitietsanpham['IDHinhAnh'])){
						$hinhanh = $this->hinhanh->getchitiethinhanh($chitietsanpham['IDHinhAnh']);
						$chitietsanpham['HinhAnh'] = $hinhanh[0]['HinhAnh'];
					}else{
						$chitietsanpham['HinhAnh'] = NULL;
					}
					if(isset($chitietsanpham['IDSanPham'])){
						$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($chitietsanpham['IDSanPham']);
						$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($chitietsanpham['IDSanPham']);
						if($giasanphammoinhat){
							$chitietsanpham['Gia'] = $giasanphammoinhat[0]['Gia'];
							$chitietsanpham['DonVi'] = $giasanphammoinhat[0]['DonVi'];
							$chitietsanpham['NgayCapNhat'] = $giasanphammoinhat[0]['NgayCapNhat'];
						}else{
							$chitietsanpham['Gia'] = NULL;
							$chitietsanpham['DonVi'] = NULL;
							$chitietsanpham['NgayCapNhat'] = NULL;
						}
						if($giamgiasanphamhientai){
							$chitietsanpham['GiaGiam'] = $giamgiasanphamhientai[0]['Gia'];
							$chitietsanpham['NgayBatDau'] = $giamgiasanphamhientai[0]['NgayKetThuc'];
							$chitietsanpham['NgayKetThuc'] = $giamgiasanphamhientai[0]['NgayBatDau'];
						}else{
							$chitietsanpham['GiaGiam'] = NULL;
							$chitietsanpham['NgayBatDau'] = NULL;
							$chitietsanpham['NgayKetThuc'] = NULL;
						}
					}else{
						$chitietsanpham['Gia'] = NULL;
						$chitietsanpham['DonVi'] = NULL;
						$chitietsanpham['NgayCapNhat'] = NULL;
						$chitietsanpham['GiaGiam'] = NULL;
						$chitietsanpham['NgayBatDau'] = NULL;
						$chitietsanpham['NgayKetThuc'] = NULL;
					}
					array_push($data,$chitietsanpham);
				}
			}
		}else{
			die();
		}
		var_dump($data[0]['IDSanPham']);die();
        $routeView = new Route();
        $routeView->view('sanpham', 'home_goiysanpham_view', $data);
	}
	public function doitrangthaisanpham(){
		$idsanpham = $_GET["idsanpham"];
		$this->sanpham->doitrangthai($idsanpham);
		$this->getsanpham();
    }
	public function addsanpham(){
		$danhmucnhathuoc = $this->danhmucnhathuoc->getdanhmucnhathuoc();
		$hinhanh = $this->hinhanh->gethinhanh();
		$data = array('danhmucnhathuoc'=>$danhmucnhathuoc, 'hinhanh'=>$hinhanh);
		$routeView = new Route();
		$routeView->view('sanpham', 'sanpham_add', $data);
    }
    public function editsanpham(){
        $data = array();
		$routeView = new Route();
		$routeView->view('sanpham', 'sanpham_edit', $data);
    }
	public function doaddsanpham(){

		$tensanpham = $_POST["tensanpham"];
		$tendanhmucnhathuoc = $_POST["tendanhmucnhathuoc"];
		$mota = $_POST["mota"];
		$idhinh = $_POST["idhinh"];
		$giasanpham = $_POST["giasanpham"];
		$donvi = $_POST["donvi"];
		$idnhathuoc = $_SESSION['idnhathuoc'];

        $datacotsanpham 	=		array('TenSanPham', 'Mota', 'IDHinhAnh', 'IDDanhMucNhaThuoc', 'IDNhaThuoc');
		$datainsertsanpham =		array($tensanpham, $mota, $idhinh, $tendanhmucnhathuoc, $idnhathuoc);
		$rs = $this->sanpham->insert_base('sanpham',$datacotsanpham,$datainsertsanpham);
		if($rs['status']){
			$idsanpham = $this->sanpham->getmaxidsanphaminnhathuoc();
			$datacotgiasanpham 	=		array('Gia', 'DonVi', 'IDSanPham');
			$datainsertgiasanpham =		array($giasanpham, $donvi, $idsanpham[0]['MAX(IDSanPham)']);
			$rs = $this->giasanpham->insert_base('giasanpham',$datacotgiasanpham,$datainsertgiasanpham);
		}
		else{
			$this->phpAlert("Thêm sản phẩm thất bại do dữ liệu!!");
		}
		if($rs['status']){
			$this->phpAlert("Thêm sản phẩm thành công!!");
			$this->getsanphamtomanage();
		}
		else{
			$this->phpAlert("Thêm sản phẩm thất bại do dữ liệu!!");
		}
    }
	public function doaddgiasanpham(){
		$idsanpham = $_POST["idsanpham"];
		$giasanpham = $_POST["giasanpham"];
		$donvi = $_POST["donvi"];
		$ngaycapnhat = $_POST["ngaycapnhat"];

        $datacot 	=		array('Gia', 'DonVi', 'NgayCapNhat', 'IDSanPham');
		$datainsert =		array($giasanpham, $donvi, $ngaycapnhat, $idsanpham);
		$rs = $this->giasanpham->insert_base('giasanpham',$datacot,$datainsert);
		if($rs['status']){
			$this->phpAlert("Thêm giá sản phẩm thành công!!");
			$this->getchitietsanpham($idsanpham);
		}
		else{
			$this->phpAlert("Thêm giá sản phẩm thất bại do dữ liệu!!");
		}
    }
	public function doaddgiamgiasanpham(){
		$idsanpham = $_POST["idsanpham"];
		$giasanpham = $_POST["giasanpham"];
		$ngaybatdau = $_POST["ngaybatdau"];
		$ngayketthuc = $_POST["ngayketthuc"];
		$giamgiasanphamhientai = $this->giamgiasanpham->getgiamgiahiemtai($idsanpham);
		if($giamgiasanphamhientai && $ngaybatdau <= $giamgiasanphamhientai[0]['NgayKetThuc']){
			$this->phpAlert("Thời gian giảm giá không phù hợp!!");
			$this->getchitietsanpham($idsanpham);
		}else{
			$datacot 	=		array('Gia', 'NgayBatDau', 'NgayKetThuc', 'IDSanPham');
			$datainsert =		array($giasanpham, $ngaybatdau, $ngayketthuc, $idsanpham);
			$rs = $this->giamgiasanpham->insert_base('giamgiasanpham',$datacot,$datainsert);
			if($rs['status']){
				$this->phpAlert("Thêm giảm giá sản phẩm thành công!!");
				$this->getchitietsanpham($idsanpham);
			}
			else{
				$this->phpAlert("Thêm giảm giá sản phẩm thất bại do dữ liệu!!");
			}
		}
        
    }
    public function doeditsanpham(){
		$idsanpham = $_POST["idsanpham"];
		$tensanpham = $_POST["tensanpham"];
		$tendanhmucnhathuoc = $_POST["tendanhmucnhathuoc"];
		$mota = $_POST["mota"];
		$idhinh = $_POST["idhinh"];
		$idnhathuoc = $_SESSION['idnhathuoc'];
        
        $datacot 	=		array('TenSanPham', 'Mota', 'IDHinhAnh', 'IDDanhMucNhaThuoc', 'IDNhaThuoc');
		$datainsert =		array($tensanpham, $mota, $idhinh, $tendanhmucnhathuoc, $idnhathuoc);
		$rs = $this->sanpham->update_base('sanpham',$datacot,$datainsert,"IDSanPham = ".$idsanpham);
		if($rs['status']){
			$this->phpAlert("Sửa thông sản phẩm thành công!!");
			$this->getsanphamtomanage();
		}
		else{
			$this->phpAlert("Sửa thông sản phẩm thất bại do dữ liệu!!");
		}
    }
    public function dodeletesanpham(){
		$IDsanpham = $_GET["idsanpham"];
		$rs = $this->sanpham->delete_base('sanpham',"IDSanPham = ".$IDsanpham);
		if($rs['status']){
			$this->phpAlert("Xóa sản phẩm thành công!!");
			$this->getsanphamtomanage();
		}
		else{
			$this->phpAlert("Xóa sản phẩm thất bại do dữ liệu!!");
		}
	}
	public function dodeletegiasanpham(){
		$IDGiaSanPham = $_GET["idgiasanpham"];
		$idsanpham = $_GET["idsanpham"];
		$rs = $this->giasanpham->delete_base('giasanpham',"IDGiaSanPham = ".$IDGiaSanPham);
		if($rs['status']){
			$this->phpAlert("Xóa gia sản phẩm thành công!!");
			$this->getchitietsanpham($idsanpham);
		}
		else{
			$this->phpAlert("Xóa sản phẩm thất bại do dữ liệu!!");
		}
	}
	public function dodeletegiamgiasanpham(){
		$IDGiamGiaSanPham = $_GET["idgiamgiasanpham"];
		$idsanpham = $_GET["idsanpham"];
		$rs = $this->giamgiasanpham->delete_base('giamgiasanpham',"IDGiamGiaSanPham = ".$IDGiamGiaSanPham);
		if($rs['status']){
			$this->phpAlert("Xóa giảm gia sản phẩm thành công!!");
			$this->getchitietsanpham($idsanpham);
		}
		else{
			$this->phpAlert("Xóa giảm sản phẩm thất bại do dữ liệu!!");
		}
	}
	
	public function xemgiohang(){
		$data = array();
		$giohang = array();
		$sosanpham = 0;
		$tongsoluong = 0;
		$tongtien = 0;
		$cookie = $_COOKIE;
		unset($cookie['PHPSESSID']);
		unset($cookie['sidenav-state']);
		$routeView = new Route();
		if($cookie){
			foreach ($cookie as $key => $value) {
				$chitietsanpham = $this->sanpham->getchitietsanpham($key);
				$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($key);
				$hinhanh = $this->hinhanh->getchitiethinhanh($chitietsanpham[0]['IDHinhAnh']);
				$phantu = array('IDSanPham'=>$key, 'SoLuong'=>$value, 'TenSanPham'=>$chitietsanpham[0]['TenSanPham'], 'HinhAnh'=>$hinhanh[0]['HinhAnh'], 'Gia'=>$giasanphammoinhat[0]['Gia'], 'SoTien'=>$giasanphammoinhat[0]['Gia']*$value);
				array_push($giohang,$phantu);
				$sosanpham++;
				$tongsoluong += $value;
				$tongtien += $giasanphammoinhat[0]['Gia']*$value;
			};
			$data = array('GioHang'=>$giohang, 'SoSanPham'=>$sosanpham, 'TongSoLuong'=>$tongsoluong, 'TongTien'=>$tongtien);
			$routeView->view('sanpham', 'home_giohang_view', $data);
		}else{
			$this->phpAlert("Giỏ hàng trống!");
			$routeView->view('sanpham', 'home_view', $data);
		}
	}
	public function getxacnhangiohang(){
		$data = array();
		$sosanpham = 0;
		$tongsoluong = 0;
		$tongtien = 0;
		$cookie = $_COOKIE;
		unset($cookie['PHPSESSID']);
		unset($cookie['sidenav-state']);
		if($cookie){
			foreach ($cookie as $key => $value) {
				$giasanphammoinhat = $this->giasanpham->getgiasanphammoinhat($key);
				$sosanpham++;
				$tongsoluong += $value;
				$tongtien += $giasanphammoinhat[0]['Gia']*$value;
			};
		}else{
			$this->phpAlert("Giỏ hàng trống!");
			$routeView->view('sanpham', 'home_view', $data);
		}
		$data = array('SoSanPham'=>$sosanpham, 'TongSoLuong'=>$tongsoluong, 'TongTien'=>$tongtien);
		$routeView = new Route();
        $routeView->view('sanpham', 'home_xacnhangiohang_view', $data);
	}
}
?>