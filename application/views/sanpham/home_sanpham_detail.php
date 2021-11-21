<div class="row ml-5 mr-5">
    <div class="col-lg-12">

        <div class="row">
            <div class="col-lg-5">
                <p class="lead">Medicin > <?= $data['sanpham'][0]['TenDanhMucTongQuat']?> > <?= $data['sanpham'][0]['TenDanhMucNhaThuoc']?> > <?= $data['sanpham'][0]['TenSanPham']?></p>
            </div>
        </div>

        <div class="form-group bg-white shadow">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-5 bg-white">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <img style="width: 100%; height: 100%;" src="../public/image/sanpham/<?= $data['sanpham'][0]['HinhAnh'] ?>" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: right;">
                                    <button onclick="thichsanpham(<?= $data['sanpham'][0]['IDSanPham'] ?>)" class="btn btn-link text-danger"><h6 class="text-danger mb-0"><?= $data['sanpham'][0]['DaThich'] ? '<i class="fas fa-heart"></i>' : '<i class="far fa-heart"></i>' ?> Đã thích (<?= $data['sanpham'][0]['LuotThich'] ?>)</h6></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 bg-white" style="padding-right: 50px;">

                            <div class="row mt-3">
                                <div class="col-12">
                                    <h3 class="heading-title text-info mb-0"><?= $data['sanpham'][0]['TenSanPham']?></h3>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="row mt-2">
                                <div class="col-12">
                                    <p class="text-muted mb-0">
                                        <?php if($data['sanpham'][0]['SoLuotDanhGia']) {?>
                                        <span class="fa fa-star <?= $data['sanpham'][0]['TongSoSao']/$data['sanpham'][0]['SoLuotDanhGia'] >= 1 ? 'checked' : 'text-secondary' ?>"></span>
                                        <span class="fa fa-star <?= $data['sanpham'][0]['TongSoSao']/$data['sanpham'][0]['SoLuotDanhGia'] >= 2 ? 'checked' : 'text-secondary' ?>"></span>
                                        <span class="fa fa-star <?= $data['sanpham'][0]['TongSoSao']/$data['sanpham'][0]['SoLuotDanhGia'] >= 3 ? 'checked' : 'text-secondary' ?>"></span>
                                        <span class="fa fa-star <?= $data['sanpham'][0]['TongSoSao']/$data['sanpham'][0]['SoLuotDanhGia'] >= 4 ? 'checked' : 'text-secondary' ?>"></span>
                                        <span class="fa fa-star <?= $data['sanpham'][0]['TongSoSao']/$data['sanpham'][0]['SoLuotDanhGia'] >= 5 ? 'checked' : 'text-secondary' ?>"></span>
                                        <?php }else{?>
                                        Chưa có đánh giá
                                        <?php }?>
                                         | Đã bán : <?= $data['sanpham'][0]['SoLuongXuat']?>
                                    </p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 bg-secondary" style="padding: 10px;">
                                    <h3 class="text-success mb-0">Giá bán: <?= $data['sanpham'][0]['GiaGiam'] ? '<strike class="text-danger mb-0 fs-70">'.$data['sanpham'][0]['Gia'].'</strike> '.$data['sanpham'][0]['GiaGiam'] : $data['sanpham'][0]['Gia'] ?>/<?= $data['sanpham'][0]['DonVi'] ?></h3>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <h4 class="text-muted mb-0">Mô tả</h4>
                                </div>
                                <div class="col-9">
                                    <p class="text-muted mb-0"><?= $data['sanpham'][0]['Mota'] ?></p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3">
                                    <h4 class="text-muted mb-0">Số lượng</h4>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="number" id="input-soluong">
                                </div>
                                <div class="col-7">
                                    <h4 class="text-muted mb-0"><?= $data['sanpham'][0]['SoLuongNhap'] - $data['sanpham'][0]['SoLuongXuat']?> sản phẩm có sẵn</h4>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3"></div>
                                <div class="col-9">
                                    <button onclick="themvaogiohang(<?= $data['sanpham'][0]['IDSanPham'] ?>)" class="btn btn-outline-success"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group bg-white shadow">
            <div class="row">
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <img style="width: 100%; height: 150px;" src="../public/image/nhathuoc/<?= $data['nhathuoc'][0]['AnhDaiDien']?>" alt="photo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5  p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-info"><?= $data['nhathuoc'][0]['TenNhaThuoc']?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button onclick="chitietnhathuoc(<?= $data['nhathuoc'][0]['IDNhaThuoc']?>)" class="btn btn-outline-info">Xem cửa hàng</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5  p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-warning">Đánh giá: <?= $data['sanpham'][0]['SoLuotDanhGia']?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-warning">Ngày đăng ký: <?= $data['nhathuoc'][0]['NgayDangKy']?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-warning">Số sản phẩm: <?= $data['nhathuoc'][0]['SoLuongNhapCuaNhaThuoc'] - $data['nhathuoc'][0]['SoLuongXuatCuaNhaThuoc'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group bg-white shadow p-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-info">Đánh giá sản phẩm</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="sanpham-danhsachdanhgia"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-secondary">
                                <span onclick="rating(1)" id="rating-1" class="fa fa-star"></span>
                                <span onclick="rating(2)" id="rating-2" class="fa fa-star"></span>
                                <span onclick="rating(3)" id="rating-3" class="fa fa-star"></span>
                                <span onclick="rating(4)" id="rating-4" class="fa fa-star"></span>
                                <span onclick="rating(5)" id="rating-5" class="fa fa-star"></span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-11">
                            <input id="input-motabinhluan" class="form-control" type="text">
                        </div>
                        <div class="col-lg-1">
                            <button onclick="guibinhluan()" class="btn btn-info" type="button">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var idsanpham = "";
    var idnhathuochientai = "";
    idsanpham = "<?php echo $data['sanpham'][0]['IDSanPham'] ?>";
    idnhathuochientai = "<?php echo $data['idnhathuochientai'] ?>";
    var sosao = 0;
    $(document).ready( function () {
        $.get("ajax.php?controller=cdanhgia&action=getdanhgiabysanpham", {
            "idsanpham" : idsanpham,
        },function(data){
            $("#sanpham-danhsachdanhgia").html(data);
        });
    } );
    function themvaogiohang(IDSanPham) {
        if(idnhathuochientai){
            var idnhathuocmoi = "<?= $data['nhathuoc'][0]['IDNhaThuoc']?>";
            if(idnhathuocmoi == idnhathuochientai){
                var cname = IDSanPham;
                var cvalue = $('#input-soluong').val();
                if(cvalue != ""){
                    var d = new Date();
                    d.setTime(d.getTime() + (24*60*60*1000));
                    var expires = "expires="+ d.toUTCString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                    $.post("ajax.php?controller=csanpham&action=xemgiohang", {},function(data){
                        $("#detail-sanpham").html(data);
                    });
                }else{
                    alert("Số lượng không đúng");
                }
            }else{
                alert("Sản phẩm khác nhà thuốc trong giỏ hàng!");
            }
        }else{
            var cname = IDSanPham;
            var cvalue = $('#input-soluong').val();
            if(cvalue != ""){
                var d = new Date();
                d.setTime(d.getTime() + (24*60*60*1000));
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                $.post("ajax.php?controller=csanpham&action=xemgiohang", {},function(data){
                    $("#detail-sanpham").html(data);
                });
            }else{
                alert("Số lượng không đúng");
            }
        }
        
    }
    function rating(SoSao) {
        for (let i = 1; i <= 5; i++) {
            $("#rating-"+i).removeClass("checked");
        }
        for (let i = 1; i <= SoSao; i++) {
            $("#rating-"+i).addClass("checked");
        }
        sosao = SoSao;
    }
    function guibinhluan() {
        var IDSanPham = '<?= $data['sanpham'][0]['IDSanPham']?>';
        var IDNguoiDung = '<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ""?>';
        var mota = $('#input-motabinhluan').val();
        if(!IDNguoiDung){
            if (confirm("Bạn cần đăng nhập để bình luận! Đăng nhập ngay bây giờ?")) {
                window.location.assign("login.php")
            } else {}
        }else if(!mota){
            alert("Chưa nhập đánh giá!");
        }else if(sosao == 0){
            alert("Chưa chọn số sao!");
        } else{
            $.post("ajax.php?controller=cdanhgia&action=doadddanhgiasanpham", {
                'idsanpham' : IDSanPham,
                'idnguoidung' : IDNguoiDung,
                'mota' : mota,
                'sosao' : sosao
            },function(data){
                $("#sanpham-danhsachdanhgia").html(data);
            });
        }
    }
    function chitietnhathuoc(IDNhaThuoc) {
        $.get("ajax.php?controller=cnhathuoc&action=loadthongtinnhathuoclenhome", {
            "idnhathuoc" : IDNhaThuoc
        },function(data){
            $("#detail-sanpham").html(data);
        });
    }
    function thichsanpham(IDSanPham) {
        var IDNguoiDung = '<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ""?>';
        if(!IDNguoiDung){
            if (confirm("Bạn cần đăng nhập để bình luận! Đăng nhập ngay bây giờ?")) {
                window.location.assign("login.php")
            } else {}
        } else{
            $.get("ajax.php?controller=csanpham&action=thichsanpham", {
                "idsanpham" : IDSanPham,
                "idnguoidung" : IDNguoiDung
            },function(data){
                $("#detail-sanpham").html(data);
            });
        }
    }
</script>