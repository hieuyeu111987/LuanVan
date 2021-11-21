<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <p class="lead">Medicin > Giỏ hàng</p>
            </div>
        </div>
        <div id="table" class="bg-white shadow">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table style="margin: 0px;" id="data-table" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">So luong</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php   for($i = 0; $i < count($data['GioHang']); $i++) { ?>
                                        <tr>
                                            <td><?=$i + 1?></td>
                                            <td><img style="height: 43px;" src="../public/image/sanpham/<?= $data['GioHang'][$i]['HinhAnh'] ?>" alt="photo"></td>
                                            <td><?=$data['GioHang'][$i]['TenSanPham']?></td>
                                            <td id="Gia-<?=$data['GioHang'][$i]['IDSanPham']?>"><?=$data['GioHang'][$i]['Gia']?></td>
                                            <td style="text-align: center; width: 140px;" class="nav-item">

                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <button onclick="tangsanpham(<?=$data['GioHang'][$i]['IDSanPham']?>)" class="btn btn-sm btn-primary" type="button"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                    <input onchange="thaydoisoluong(<?=$data['GioHang'][$i]['IDSanPham']?>)" style="text-align: center;" class="form-control  btn-sm" type="number" name="input-soluong-<?=$data['GioHang'][$i]['IDSanPham']?>" id="input-soluong-<?=$data['GioHang'][$i]['IDSanPham']?>"  min="1" value="<?=$data['GioHang'][$i]['SoLuong']?>">
                                                    <div class="input-group-append">
                                                        <button onclick="giamsanpham(<?=$data['GioHang'][$i]['IDSanPham']?>)" class="btn btn-sm btn-primary" type="button"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td id="SoTien-<?=$data['GioHang'][$i]['IDSanPham']?>"><?=$data['GioHang'][$i]['SoTien']?></td>
                                            <td style="text-align: center;">
                                                <button onclick="xoasanphamkhoigiohang(<?=$data['GioHang'][$i]['IDSanPham']?>)" class="btn btn-1 btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
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
        
        <div id="xacnhangiohang"></div>
        
    </div>
</div>
<script>
    $(document).ready( function () {
        $.post("ajax.php?controller=csanpham&action=getxacnhangiohang", {},function(data){
            $("#xacnhangiohang").html(data);
        });
    } );
    function tangsanpham(IDSanPham) {
        var soluong = $('#input-soluong-'+IDSanPham).val();
        var gia = $('#Gia-'+IDSanPham).text();
        var sotien = $('#SoTien-'+IDSanPham).text();
        $('#input-soluong-'+IDSanPham).val(Number(soluong) + 1);
        $('#SoTien-'+IDSanPham).text(Number(sotien) + Number(gia));

        var cname = IDSanPham;
        var cvalue = Number(soluong) + 1;
        var d = new Date();
        d.setTime(d.getTime() + (24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        $.post("ajax.php?controller=csanpham&action=getxacnhangiohang", {},function(data){
            $("#xacnhangiohang").html(data);
        });
    }
    function giamsanpham(IDSanPham) {
        var soluong = $('#input-soluong-'+IDSanPham).val();
        var gia = $('#Gia-'+IDSanPham).text();
        var sotien = $('#SoTien-'+IDSanPham).text();
        $('#input-soluong-'+IDSanPham).val(Number(soluong) - 1);
        $('#SoTien-'+IDSanPham).text(Number(sotien) - Number(gia));

        var cname = IDSanPham;
        var cvalue = Number(soluong) - 1;
        var d = new Date();
        d.setTime(d.getTime() + (24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        $.post("ajax.php?controller=csanpham&action=getxacnhangiohang", {},function(data){
            $("#xacnhangiohang").html(data);
        });
    }
    function thaydoisoluong(IDSanPham) {
        var soluong = $('#input-soluong-'+IDSanPham).val();
        var gia = $('#Gia-'+IDSanPham).text();
        var sotien = $('#SoTien-'+IDSanPham).text();
        $('#input-soluong-'+IDSanPham).val(Number(soluong));
        $('#SoTien-'+IDSanPham).text(Number(soluong) * Number(gia));

        var cname = IDSanPham;
        var cvalue = Number(soluong);
        var d = new Date();
        d.setTime(d.getTime() + (24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        $.post("ajax.php?controller=csanpham&action=getxacnhangiohang", {},function(data){
            $("#xacnhangiohang").html(data);
        });
    }
    function xoasanphamkhoigiohang(IDSanPham) {
        var cname = IDSanPham;
        var cvalue = 0;
        var d = new Date();
        d.setTime(d.getTime() + (24*60*60*1000));
        var expires = "expires=Sun, 02 May 2000 15:01:25 GMT";
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        $.post("ajax.php?controller=csanpham&action=xemgiohang", {},function(data){
            $("#detail-sanpham").html(data);
        });
    }
</script>
