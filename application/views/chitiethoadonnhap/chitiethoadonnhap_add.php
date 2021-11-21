<hr class="my-4" />

<form>
    <div class="pl-lg-4">

        <div class="row">
            <div class="col-12 text-right">
                <button onclick="thoatdanhsachchittietsanpham()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Tên sản phẩm</label>
                    <select id="input-tensanpham" class="form-control">
                    <option value="NULL"></option>
                    <?php   for($i = 0; $i < count($data['sanpham']); $i++) { ?>
                    <option value="<?=$data['sanpham'][$i]['IDSanPham']?>"><?=$data['sanpham'][$i]['TenSanPham']?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Số lượng</label>
                    <input type="number" id="input-soluong" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Giá</label>
                    <input type="number" id="input-gia" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Đơn vị bán sản phẩm</label>
                    <input type="text" id="input-donviban" class="form-control">
                </div>
            </div>
        </div>

    </div>
    <hr class="my-4" />
    <div class="row">
        <div class="col-lg-12">
            <div class="text-right">
                <button onclick="doaddchitiethoadonnhap(<?=$data['idhoadonnhap']?>)" class="btn btn-sm btn-info" type="button">Thêm sản phẩm vào hóa đơn</button>
            </div>
        </div>
    </div>
</form>

<script>
    function doaddchitiethoadonnhap(IDHoaDonNhap) {
        var tensanpham = $('#input-tensanpham').val();
        var soluong = $('#input-soluong').val();
        var gia = $('#input-gia').val();
        var donviban = $('#input-donviban').val();
        $.post("ajax.php?controller=choadonnhap&action=doaddchitiethoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap,
            "tensanpham" : tensanpham,
            "soluong" : soluong,
            "gia" : gia,
            "donvi" : donviban
        },function(data){
            $("#chitiethoadonsanpham").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function thoatdanhsachchittietsanpham() {
        $("#addchitiethoadon").html(null);
    }
</script>