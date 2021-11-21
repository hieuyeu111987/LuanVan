<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1 order-xl-1"></div>
        <div class="col-xl-10 order-xl-1">
        <div class="card">
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">Chi tiết hóa đơn nhập hàng</h3>
                </div>
                <div class="col-4 text-right">
                <button onclick="thoat()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
                </div>
            </div>
            </div>
            <div class="card-body">
            <form>
                <div class="pl-lg-4">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Tên công ty dược</label>
                            <select id="input-tencongtyduoc" class="form-control">
                            <option value="<?=$data['hoadonnhap'][0]['IDCongTyDuoc']?>"><?=$data['hoadonnhap'][0]['TenCongTyDuoc']?></option>
                            <?php foreach ($data['congtyduoc'] as $row) { ?>
                                <option value="<?=$row['IDCongTyDuoc']?>"><?=$row['TenCongTyDuoc']?></option>
                            <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Ngày thanh toán</label>
                            <input type="date" id="input-ngaythanhtoan" class="flatpickr flatpickr-input form-control" value="<?= $data['hoadonnhap'][0]['NgayThanhToan']?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-right">
                                <button onclick="suathongtinhoadonnhap(<?=$data['hoadonnhap'][0]['IDHoaDonNhapHang']?>)" class="btn btn-sm btn-info" type="button">Cập nhật</button>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" />

                    <div id="chitiethoadonsanpham"></div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>


<div id="chitiet"></div>
<div id="addchitiethoadon"></div>
<script>
    $(document).ready( function () {
        $('#data-table2').DataTable();
        var idhoadonnhap = '<?php echo $data['hoadonnhap'][0]['IDHoaDonNhapHang']?>'
        $.post("ajax.php?controller=choadonnhap&action=getviewchitiethoadonnhap", {
            "idhoadonnhap" : idhoadonnhap
        },function(data){
            $("#chitiethoadonsanpham").html(data);
        });
    } );
</script>
<script>
    function suathongtinhoadonnhap(IDHoaDonNhap) {
        var tencongtyduoc = $('#input-tencongtyduoc').val();
        var ngaythanhtoan = $('#input-ngaythanhtoan').val();
        $.post("ajax.php?controller=choadonnhap&action=doedithoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap,
            "tencongtyduoc" : tencongtyduoc,
            "ngaythanhtoan" : ngaythanhtoan
        },function(data){
            $("#divload").html(data);
        });
    }
    // function viewhoadonnhap() {
    //     $.get("ajax.php?controller=choadonnhap&action=addhoadonnhap", {},function(data){
    //         $("#chitiet").html(data);
    //         var table = document.getElementById('table').clientHeight;
    //         var navbar = document.getElementById('navbar').clientHeight;
    //         var header = document.getElementById('header').clientHeight;
    //         window.scrollTo(0, table + navbar + header - 90);
    //     });
    // }
    // function xoadanhmuc(IDDanhMuc) {
    //     $.get("ajax.php?controller=cdanhmucnhathuoc&action=deletedanhmucnhathuoc", {
    //         "iddanhmuc" : IDDanhMuc
    //     },function(data){
    //         $("#divload").html(data);
    //     });
    // }
    function thoat() {
        $.get("ajax.php?controller=choadonnhap&action=gethoadonnhap", {},function(data){
            $("#divload").html(data);
        });
    }
  </script>