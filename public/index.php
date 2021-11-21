<?php
//Include Google Configuration File
require_once __DIR__ . '/../gconfig.php';
require_once __DIR__ . '/../application/config/path.php';

if (!isset($_SESSION['access_token']) && !isset($_SESSION['user_id'])) {
    //Create a URL to obtain user authorization
    header("Location: home.php");
}

$ready = NULL;
if(isset($_GET['ready'])){
  $ready = $_GET['ready'];
}

$color_1 = "success";
$color_2 = "info";
$tennguoidung = "";
$sdt = "";
$cmnd = "";
$email = "";
$loaitaikhoan = "";
$anhdaidien = "";
$idnhathuoc = "";
$ctl = "";
$action = "";

if(isset($_SESSION['user_id'])){
  require_once __DIR__ . '/../application/models/database.php';
  $database = new Database();
  $nguoidung = $database->getdatatable("nguoidung where IDNguoiDung = ".$_SESSION['user_id']);
  $tennguoidung = $nguoidung[0]['TenNguoiDung'];
  $sdt = $nguoidung[0]['SDT'];
  $cmnd = $nguoidung[0]['CMND'];
  $email = $nguoidung[0]['Email'];
  $loaitaikhoan = $nguoidung[0]['LoaiTaiKhoan'];
  $anhdaidien = $nguoidung[0]['AnhDaiDien'];
  $idnhathuoc = $nguoidung[0]['IDNhaThuoc'];
}
// else if(isset($_SESSION['access_token'])){
//   $nguoidung = $database->getdatatable("nguoidung where Email = ".$_SESSION['user_email_address']);
//   $tennguoidung = $nguoidung[0]['TenNguoiDung'];
//   $anhdaidien = $nguoidung[0]['AnhDaiDien'];
// }

if (isset($_GET['controller'])){
    $ctl = $_GET['controller'];
}
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Medicine</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header align-items-center">
        <a class="navbar-brand" href="home.php">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <hr class="my-3">
          <ul class="navbar-nav" style="padding-left: 10%; padding-right: 10%;">
            <li class="nav-item">
              <button id="btn-nhathuoc" onclick="nhathuoc()" class="btn btn-outline-<?= $color_1 ?>" style="width: 100%; text-align: left;">
                <i class="fas fa-clinic-medical"></i>
                <span class="nav-link-text">Nhà thuốc</span>
              </button>
            </li>
            <li class="nav-item">
              <button id="btn-danhmuctongquat" onclick="danhmuctongquat()"  class="btn btn-outline-<?= $color_1 ?>" style="width: 100%; text-align: left;">
                <i class="fas fa-list-alt"></i>
                <span class="nav-link-text">Danh mục</span>
              </button>
            </li>
            <li class="nav-item">
              <button id="btn-congtyduoc" onclick="congtyduoc()"  class="btn btn-outline-<?= $color_1 ?>" style="width: 100%; text-align: left;">
                <i class="fas fa-building"></i>
                <span class="nav-link-text">Công ty dược</span>
              </button>
            </li>
            <!-- <li class="nav-item">
              <button id="btn-tintuc" onclick="tintuc()"  class="btn btn-outline-" style="width: 100%; text-align: left;">
                <i class="fas fa-newspaper"></i>
                <span class="nav-link-text">Tin tức</span>
              </button>
            </li> -->
          </ul>
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav id="navbar" class="navbar navbar-top navbar-expand navbar-dark bg-<?= $color_1 ?> border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto ml-md-12">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img style="height: 100%;" alt="Image placeholder" src="./image/account/<?= $anhdaidien ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $tennguoidung ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a onclick="thongtincanhan()" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Thông tin cá nhân</span>
                </a>
                <a onclick="doimatkhau()" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Đổi mật khẩu</span>
                </a>
                <a href="home.php" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Xem trang bán hàng</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Đăng xuất</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div id="header" class="header bg-<?= $color_1 ?> pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <div id="divload"></div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready( function () {
      var ready = "<?php echo $ready; ?>";
      if(ready){
        $.get("ajax.php?controller=c" + ready + "&action=get" + ready, {},function(data){
          $("#divload").html(data);
        });
      }
    } );
    function thongtincanhan() {
      $.get("ajax.php?controller=cnguoidung&action=getthongtinnguoidung", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
    }
    function doimatkhau() {
      $.get("ajax.php?controller=cnguoidung&action=getdoimatkhau", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
    }
    function nhathuoc() {
      $.get("ajax.php?controller=cnhathuoc&action=getnhathuoc", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
      $("#btn-nhathuoc").addClass("active");
      $("#dashboards-1").text("Nhà thuốc");
      $("#dashboards-2").text("");
    }
    function danhmuctongquat() {
      $.get("ajax.php?controller=cdanhmuctongquat&action=getdanhmuctongquat", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
      $("#btn-danhmuctongquat").addClass("active");
      $("#dashboards-1").text("Danh mục");
      $("#dashboards-2").text("");
    }
    function congtyduoc() {
      $.get("ajax.php?controller=ccongtyduoc&action=getcongtyduoc", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
      $("#btn-congtyduoc").addClass("active");
      $("#dashboards-1").text("Công ty dược");
      $("#dashboards-2").text("");
    }
    function tintuc() {
      $.get("ajax.php?controller=ctintuc&action=gettintuc", {},function(data){
        $("#divload").html(data);
      });
      $("button").removeClass("active");
      $("#btn-tintuc").addClass("active");
      $("#dashboards-1").text("Tin tức");
      $("#dashboards-2").text("");
    }
  </script>


</body>

</html>