<?php
//Include Google Configuration File
require_once __DIR__.'/../gconfig.php';
require_once __DIR__ . '/../application/models/database.php';
$database = new Database();
$nguoidung = NULL;
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {
  //It will Attempt to exchange a code for an valid authentication token.
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  if (!isset($token['error'])) {
    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);
    
    $_SESSION['GoogleAuth2'] = true;
    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];

    //Create Object of Google Service OAuth 2 class
    $google_client = new Google_Service_Oauth2($google_client);
    
    //Get user profile data from google
    $data = $google_client->userinfo->get();

    //Below you can find Get profile data and store into $_SESSION variable
    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
    }

    if (!empty($data['gender'])) {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if (!empty($data['picture'])) {
      $_SESSION['user_image'] = $data['picture'];
    }
  }
  $nguoidung = $database->getdatatable("nguoidung where Email = ".'"'.$_SESSION['user_email_address'].'"');
}else if(isset($_POST["taikhoan"]) && isset($_POST["matkhau"])){
  $nguoidung = $database->getdatatable("nguoidung where TaiKhoan = ".'"'.$_POST["taikhoan"].'"'." AND MatKhau = ".'"'.md5($_POST["matkhau"]).'"');
}

if($nguoidung){
  $_SESSION['user_id'] = $nguoidung[0]['IDNguoiDung'];
  $_SESSION['loaitaikhoan'] = $nguoidung[0]['LoaiTaiKhoan'];
}
if(isset($_SESSION['loaitaikhoan'])){
  if ($_SESSION['loaitaikhoan'] == 0 || $_SESSION['loaitaikhoan'] == 1) {
    header("Location: index.php?ready=nhathuoc");
  }else if($_SESSION['loaitaikhoan'] == 2){
    header("Location: manage.php");
  }else if($_SESSION['loaitaikhoan'] == 3){
    header("Location: home.php");
  }else{
    header("Location: home.php");
  }
}else{
  echo  '<script type="text/javascript">
          alert("Tên đăng nhập hoặc mật khẩu của bạn không đúng!")
          window.location.replace("login.php");
        </script>';
}

?>