<div class="row mt-3">
    <div class="col-lg-12">
        <div class="form-group bg-white shadow">
            <div class="row" style="padding: 16px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <h5 class="text-info">Số sản phẩm: <?=$data['SoSanPham']?></h5>
                </div>
                
                <div class="col-lg-2">
                    <h5 class="text-info">Tổng số lượng: <?=$data['TongSoLuong']?></h5>
                </div>
                <div class="col-lg-3">
                    <h5 class="text-info">Tổng tiền: <?=$data['TongTien']?> VND</h5>
                </div>
                <div class="col-lg-3 text-right">
                    <button onclick="xacnhangiohang()" class="btn btn-1 btn-info" type="button">Xác nhận giỏ hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function xacnhangiohang() {
        var idnguoidung = "<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>";
        if(idnguoidung){
            $.post("ajax.php?controller=choadonxuat&action=getthanhtoan", {},function(data){
                $("#detail-sanpham").html(data);
            });
        }else{
            if (confirm("Bạn cần đăng nhập để thanh toán! Đăng nhập ngay bây giờ?")) {
                window.location.assign("login.php");
            } else {}
        }
        
    }
</script>