<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Hóa đơn nhập hàng</h3>
                    </div>
                    <div class="col-4 text-right">
                        <button onclick="getthemhoadonnhap()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="data-table" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên công ty dược</th>
                            <th scope="col">Ngày thanh toán</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php   for($i = 0; $i < count($data); $i++) { ?>
                            <tr>
                                <td><?=$i + 1?></td>
                                <td><?=$data[$i]['TenCongTyDuoc']?></td>
                                <td><?=$data[$i]['NgayThanhToan']?></td>
                                <td style="text-align: center;">
                                    <button onclick="chitiethoadonnhap(<?=$data[$i]['IDHoaDonNhapHang']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                    <button onclick="xoahoadonnhap(<?=$data[$i]['IDHoaDonNhapHang']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
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

<div id="chitiet"></div>
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function chitiethoadonnhap(IDHoaDonNhap) {
        $.get("ajax.php?controller=choadonnhap&action=getchitiethoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap
        },function(data){
            $("#chitiet").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header);
        });
    }
    function getthemhoadonnhap() {
        $.get("ajax.php?controller=choadonnhap&action=addhoadonnhap", {},function(data){
            $("#chitiet").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function xoahoadonnhap(IDHoaDonNhap) {
        $.get("ajax.php?controller=choadonnhap&action=deletehoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>