<?php
//Include Google Configuration File
require_once __DIR__ . '/../gconfig.php';
// require_once __DIR__ . '/../application/models/database.php';
// $database = new Database();

// if(isset($_POST["taikhoan"]) && isset($_POST["matkhau"])){
//   $nguoidung = $database->getdatatable("nguoidung where TaiKhoan = ".'"'.$_POST["taikhoan"].'"'." AND MatKhau = ".'"'.md5($_POST["matkhau"]).'"');
//   $_SESSION['user_id'] = $nguoidung[0]['IDNguoiDung'];
//   $_SESSION['loaitaikhoan'] = $nguoidung[0]['LoaiTaiKhoan'];
// }

// if (isset($_SESSION['user_id'])) {
//   header("Location: dashboard.php");
// }else{}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Medicine - Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <!-- <div class="text-muted text-center mt-2 mb-3"><small>Sign in</small></div> -->
            <div class="text-center">
              <div class="navbar-horizontal navbar-transparent">
                <div class="container">
                  <a class="navbar-brand mt-2" href="home.php">
                    <img src="../public/image/logo/bishop-logo.png">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="dashboard.php" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" name="taikhoan">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="matkhau">
                  </div>
                </div>
                <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Ghi nhớ đăng nhập</span>
                  </label>
                </div> -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" >Đăng nhập</button>
                  <a href="<?= $google_client->createAuthUrl(); ?>" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </form>
              
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="home.php" class="text-light"><small>Quay lại mua hàng</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="register.php" class="text-light"><small>Tạo tài khoản mới</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>