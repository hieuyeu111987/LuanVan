<?php
require_once __DIR__."/../config/path.php";
require_once views.'route.php';
require_once controllers.'cbase.php';
// session_start();
class cdangky extends cbase
{
    protected $dangky;
    function __construct() {
	   $this->dangky = parent::setModel('mdangky', $this->dangky);
	}
    public function guimaxacnhan(){
        $sdt = '+84 '.substr($_POST["sdt"],1);
        if(!isset($_SESSION['maxacthuc'])){
            $_SESSION['maxacthuc'] = rand(100000, 999999);
        }else{}
        $recipients = [$sdt];
        $url = "https://gatewayapi.com/rest/mtsms";
        $api_token = "bzFGId_XSrCXuUgaSQsVN4GOw5CsClWg_e6COL8wZVPB9EqcMOvBBVEgkqYDUUFe";
        $json = [
            // 'encoding' => 'UTF-8',
            'sender' => 'Bishop',
            'message' => (string)$_SESSION['maxacthuc'],
            'recipients' => [],
        ];
        foreach ($recipients as $msisdn) {
        $json['recipients'][] = ['msisdn' => $msisdn];
        }
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        // print($result); // print result as json string
        $json = json_decode($result); // convert to object
        // print_r($json->ids); // print the array with ids
        // print_r($json->usage->total_cost); // print total cost from ‘usage’ object
        $this->phpAlert("Mã xác thực đã được gửi đên số điện thoại của bạn!");
    }


    public function kiemtramaxacnhan(){
        if(isset($_SESSION['maxacthuc'])){
            $maxacthuc = $_POST["maxacthuc"];
            if($maxacthuc == $_SESSION['maxacthuc']){
                $tennguoidung = $_POST["tennguoidung"];
                $sdt = $_POST["sdt"];
                $cmnd = $_POST["cmnd"];
                $email = $_POST["email"];
                $taikhoan = $_POST["taikhoan"];
                $matkhau = $_POST["matkhau"];
                $anhdaidien = $_FILES['anhdaidien']['name'];
                move_uploaded_file($_FILES['anhdaidien']['tmp_name'], '../public/image/account/' . $_FILES['anhdaidien']['name']);
                $datacot 	=		array('TenNguoiDung', 'SDT', 'CMND', 'Email', 'TaiKhoan', 'MatKhau', 'LoaiTaiKhoan', 'AnhDaiDien');
                $datainsert =		array($tennguoidung, $sdt, $cmnd, $email, $taikhoan, md5($matkhau), 3, $anhdaidien);
                $rs = $this->dangky->insert_base('nguoidung',$datacot,$datainsert);
                if($rs['status']){
                    $this->phpAlert("Xác thực thành công! Tài khoản đã được tạo!");
                    $_SESSION['maxacthuc'] = NULL;
                    header("Location: login.php");
                }
                else{
                    $this->phpAlert("Tạo tài khoản thất bại do dữ liệu!!");
                    header("Location: register.php");
                }
            }else{
                $this->phpAlert("Xác thực thất bại");
                header("Location: register.php");
            }
        }else{
            $this->phpAlert("Mã xác thực chưa được gửi!!");
            header("Location: register.php");
        }
    }
}
?>