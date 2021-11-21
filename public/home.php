<?php

require_once __DIR__ . '/../gconfig.php';
require_once __DIR__ . '/../application/config/path.php';

$idnguoidung = "";
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
  $idnguoidung = $nguoidung[0]['IDNguoiDung'];
  $tennguoidung = $nguoidung[0]['TenNguoiDung'];
  $sdt = $nguoidung[0]['SDT'];
  $cmnd = $nguoidung[0]['CMND'];
  $email = $nguoidung[0]['Email'];
  $loaitaikhoan = $nguoidung[0]['LoaiTaiKhoan'];
  $anhdaidien = $nguoidung[0]['AnhDaiDien'];
  $idnhathuoc = $nguoidung[0]['IDNhaThuoc'];
}else if(isset($_SESSION['access_token'])){
  $tennguoidung = $_SESSION['user_last_name'] . ' ' . $_SESSION['user_first_name'];
  $anhdaidien = $_SESSION['user_image'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Paypal -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
    BiShop | Dược phẩm trực tuyến
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
    <link href="../public/custom/css/home.css" rel="stylesheet" />

    <!-- Favicon -->
    <!-- <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png"> -->
    <!-- Icons -->
    <!-- <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css"> -->
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css"> -->

    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="sidenav-header align-items-center">
                <a class="navbar-brand" href="home.php">
                    <!-- <h4 class="text-white mb-0" style="text-transform: none;">BiShop</h4> -->
                    <img src="../public/image/logo/bg-covien.png" class="navbar-brand-img"  alt="...">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-danger">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="javascript:;">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="javascript:;">
                            <i class="fa fa-twitter"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="javascript:;">
                            <i class="fa fa-google-plus"></i>
                            <span class="nav-link-inner--text d-lg-none">Google +</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="javascript:;">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-5">
                        <div class="input-group input-group-alternative">
                            <input id="input-search" class="form-control" placeholder="Search" type="text">
                            <div class="input-group-prepend">
                                <button onclick="timkiemsanpham()" class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                            </div>
                            <button onclick="xemgiohang()" class="btn btn-primary" type="button"><i class="fas fa-shopping-cart"></i></button>
                            <button onclick="xembando()" class="btn btn-primary" type="button"><i class="fas fa-map-marker-alt"></i></button>
                        </div>
                    </li>
                    <?php if(!isset($_SESSION['loaitaikhoan'])) {?>
                    <li class="nav-item">
                        <a href="register.php" class="btn btn-link text-white">Đăng ký</a>
                        <a href="login.php" class="btn btn-link text-white">Đăng nhập</a>
                    </li>
                    <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link pr-0 p-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img style="height: 100%;" alt="Image placeholder" src="./image/account/<?=$anhdaidien?>">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold"><?= $tennguoidung ?></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right mr-9">
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

                            <?php if($_SESSION['loaitaikhoan'] != 3) {?>
                            <a href="dashboard.php" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Xem trang dashboard</span>
                            </a>

                            <?php } else{ ?>

                                <a href="register_pharmacy.php" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Đăng ký nhà thuốc</span>
                            </a>
                            <?php } ?>

                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="detail-sanpham"></div>

    <div id="goiy-sanpham"></div>

    <div id="congtyduoc-view"></div>
    
    <footer class="bg-primary mt-5">
        <p class="text-white mb-0" style="text-align: center;">&copy; 2021 - bản quyền thuộc về cá nhân Lê Võ Trung Hiếu</p>
    </footer>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  <!-- Paypal -->
  <script src="https://www.paypal.com/sdk/js?client-id=AV5-QdSzCb05GhZEDCoPZMmNeJNlu5pKf2Ah4URP6ggUFMx8WvAhNUmMizKPZ97GiA8Wz7DsykFtxB5Z"></script>
  
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>

<script>
    $(document).ready( function () {
        $.get("ajax.php?controller=csanpham&action=gethomeview", {},function(data){
            $("#detail-sanpham").html(data);
        });
        $.get("ajax.php?controller=csanpham&action=getgoiysanpham", {},function(data){
            $("#goiy-sanpham").html(data);
        });
        $.get("ajax.php?controller=ccongtyduoc&action=getcongtyduoctohome", {},function(data){
            $("#congtyduoc-view").html(data);
        });
    } );
    
    function xemgiohang() {
        $.get("ajax.php?controller=csanpham&action=xemgiohang", {},function(data){
            $("#detail-sanpham").html(data);
        });
    }
    function xembando() {
        $.get("ajax.php?controller=cnhathuoc&action=xembando", {},function(data){
            $("#detail-sanpham").html(data);
        });
    }
    function thongtincanhan() {
      $.get("ajax.php?controller=cnguoidung&action=getthongtinnguoidung", {},function(data){
        $("#detail-sanpham").html(data);
      });
      $("button").removeClass("active");
    }
    function doimatkhau() {
      $.get("ajax.php?controller=cnguoidung&action=getdoimatkhau", {},function(data){
        $("#detail-sanpham").html(data);
      });
      $("button").removeClass("active");
    }
</script>