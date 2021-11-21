<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1 order-xl-1"></div>
        <div class="col-xl-10 order-xl-1">
        <div class="card">
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">Thêm hóa đơn nhập hàng</h3>
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
                            <option value="NULL"></option>
                            <?php foreach ($data as $row) { ?>
                                <option value="<?=$row['IDCongTyDuoc']?>"><?=$row['TenCongTyDuoc']?></option>
                            <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Ngày thanh toán</label>
                            <input type="date" id="input-ngaythanhtoan" class="flatpickr flatpickr-input form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-right">
                                <button onclick="themhoadonnhap()" class="btn btn-sm btn-info" type="button">Thêm</button>
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
    function themhoadonnhap() {
        var tencongtyduoc = $('#input-tencongtyduoc').val();
        var ngaythanhtoan = $('#input-ngaythanhtoan').val();
        $.post("ajax.php?controller=choadonnhap&action=doaddhoadonnhap", {
            "tencongtyduoc" : tencongtyduoc,
            "ngaythanhtoan" : ngaythanhtoan
        },function(data){
            $("#chitiethoadonsanpham").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            var addchitiethoadon = document.getElementById('addchitiethoadon').clientHeight;
            window.scrollTo(0, table + navbar + header + addchitiethoadon);
        });
        
    }
    function thoat() {
        $.get("ajax.php?controller=choadonnhap&action=gethoadonnhap", {},function(data){
            $("#divload").html(data);
        });
    }
</script>