<div class="row">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Hóa đơn nhập hàng</h3>
                    </div>
                    <div class="col-4 text-right">
                        <button onclick="addchitiethoadonnhap(<?=$data['idhoadonnhap']?>)" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="data-table2" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Đơn vị</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php   for($i = 0; $i < count($data['chitiethoadonnhap']); $i++) { ?>
                            <tr>
                                <td><?=$i + 1?></td>
                                <td><?=$data['chitiethoadonnhap'][$i]['TenSanPham']?></td>
                                <td><?=$data['chitiethoadonnhap'][$i]['SoLuong']?></td>
                                <td><?=$data['chitiethoadonnhap'][$i]['Gia']?></td>
                                <td><?=$data['chitiethoadonnhap'][$i]['DonVi']?></td>
                                <td style="text-align: center;">
                                    <button onclick="editchitiethoadonnhap(<?=$data['chitiethoadonnhap'][$i]['IDChiTietHoaDonNhapHang']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                    <button onclick="xoachitiethoadonnhap(<?=$data['chitiethoadonnhap'][$i]['IDChiTietHoaDonNhapHang']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="addchitiethoadon"></div>

<script>
    $(document).ready( function () {
        $('#data-table2').DataTable();
    } );
</script>
<script>
    function addchitiethoadonnhap(IDHoaDonNhap) {
        $.get("ajax.php?controller=choadonnhap&action=addchitiethoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap
        },function(data){
            $("#addchitiethoadon").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            var addchitiethoadon = document.getElementById('addchitiethoadon').clientHeight;
            window.scrollTo(0, table + navbar + header + addchitiethoadon);
        });
    }
    
    function editchitiethoadonnhap(IDHoaDonNhap) {
        $.get("ajax.php?controller=choadonnhap&action=editchitiethoadonnhap", {
            "idhoadonnhap" : IDHoaDonNhap
        },function(data){
            $("#addchitiethoadon").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            var addchitiethoadon = document.getElementById('addchitiethoadon').clientHeight;
            window.scrollTo(0, table + navbar + header + addchitiethoadon);
        });
    }

    function xoachitiethoadonnhap(IDChiTietHoaDonNhap) {
        var idhoadonnhap = "<?=$data['idhoadonnhap']?>";
        $.post("ajax.php?controller=choadonnhap&action=deletechitiethoadonnhap", {
            "idchitiethoadonnhap" : IDChiTietHoaDonNhap,
            "idhoadonnhap" : idhoadonnhap
        },function(data){
            $("#chitiethoadonsanpham").html(data);
        });
    }
    // function thoat() {
    //   $("#chitiet").html(null);
    // }
  </script>