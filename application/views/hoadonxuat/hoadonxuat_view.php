<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Hóa đơn thanh toán khi nhận</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table-1" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên người mua</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data['hoadonxuat']); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><?=$data['hoadonxuat'][$i]['TenNguoiMua']?></td>
                                    <td><?=$data['hoadonxuat'][$i]['NgayDatHang']?></td>
                                    <td style="text-align: center;">
                                        <button onclick="chitiethoadonxuathang(<?=$data['hoadonxuat'][$i]['IDHoaDonXuatHang']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-info"></i></button>
                                        <button onclick="xoahoadonxuathang(<?=$data['hoadonxuat'][$i]['IDHoaDonXuatHang']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Hóa đơn thanh toán PayPal</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table-2" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên người mua</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data['hoadonpaypal']); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><?=$data['hoadonpaypal'][$i]['TenNguoiMua']?></td>
                                    <td><?=$data['hoadonpaypal'][$i]['NgayDatHang']?></td>
                                    <td style="text-align: center;">
                                        <button onclick="chitiethoadonpaypal('<?= $data['hoadonpaypal'][$i]['IDHoaDonPayPal'] ?>')" class="btn btn-sm btn-warning" type="button"><i class="fas fa-info"></i></button>
                                        <button onclick="xoahoadonpaypal('<?= $data['hoadonpaypal'][$i]['IDHoaDonPayPal'] ?>')" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="chitietdonhang"></div>
<script type="text/javascript" src="../tables/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#data-table-1').DataTable();
        $('#data-table-2').DataTable();
    } );
</script>
<script>
    function chitiethoadonxuathang(IDHoaDonXuatHang) {
        $.get("ajax.php?controller=choadonxuat&action=getchitiethoadonxuathang", {
            "idhoadonxuathang" : IDHoaDonXuatHang,
            "tab" : 'hoadonxuat'
        },function(data){
            $("#chitietdonhang").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function chitiethoadonpaypal(IDHoaDonPayPal) {
        $.get("ajax.php?controller=choadonxuat&action=getchitiethoadonpaypal", {
            "idhoadonpaypal" : IDHoaDonPayPal,
            "tab" : 'hoadonxuat'
        },function(data){
            $("#chitietdonhang").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    
    function xoahoadonxuathang(IDHoaDonXuat) {
        $.get("ajax.php?controller=choadonxuat&action=deletehoadonxuathang", {
            "idhoadonxuat" : IDHoaDonXuat
        },function(data){
            $("#divload").html(data);
        });
    }

    function xoahoadonpaypal(IDHoaDonPayPal) {
        $.get("ajax.php?controller=choadonxuat&action=deletehoadonpaypal", {
            "idhoadonpaypal" : IDHoaDonPayPal
        },function(data){
            $("#divload").html(data);
        });
    }
</script>