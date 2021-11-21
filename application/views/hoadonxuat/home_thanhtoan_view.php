<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <p class="lead">Medicin > Giỏ hàng > Thanh toán</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="form-group bg-white shadow">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="heading-title text-info mb-0 mt-3 ml-3">Giỏ hàng</h3>
                            <hr class="my-3">
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5"><p class="text-muted mb-0">Tên sản phẩm</p></div>
                                <div class="col-lg-2"><p class="text-muted mb-0">Đơn giá</p></div>
                                <div class="col-lg-2"><p class="text-muted mb-0">Số lượng</p></div>
                                <div class="col-lg-2"><p class="text-muted mb-0">Thành tiền</p></div>
                                <!-- <div class="col-lg-3"><p class="text-muted mb-0">Ghi chú</p></div> -->
                            </div>
                            <hr class="my-3">
                            <?php   for($i = 0; $i < count($data['GioHang']); $i++) { ?>
                                <div class="row"style="padding: 16px;">
                                    <div class="col-lg-12">
                                        <h5 class="mb-0 text-success"><?= $data['GioHang'][$i]['TenNhaThuoc']?></h5>
                                        <div class="row">
                                            <div class="col-lg-1">
                                                <img style="height: 50px;" src="../public/image/sanpham/<?= $data['GioHang'][$i]['HinhAnh'] ?>" alt="photo">
                                            </div>
                                            <div class="col-lg-5">
                                                <p><?= $data['GioHang'][$i]['TenSanPham']?></p>
                                            </div>
                                            <div class="col-lg-2">
                                                <p><?= $data['GioHang'][$i]['Gia'] ?></p>
                                            </div>
                                            <div class="col-lg-2">
                                                <p><?= $data['GioHang'][$i]['SoLuong'] ?></p>
                                            </div>
                                            <div class="col-lg-2">
                                                <p><?= $data['GioHang'][$i]['SoTien'] ?></p>
                                            </div>
                                            <!-- <div class="col-lg-3">
                                                <textarea class="form-control" name="input-mota" id="input-mota-" rows="2"></textarea>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <?= $i==(count($data['GioHang'])-1) ? '' : '<hr class="my-3">' ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3"></div>
            
            <div class="col-lg-6">
                <div class="form-group bg-white shadow">
                
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="heading-title text-info mb-0 mt-3 ml-3">Phương thức thanh toán</h3>
                            <hr class="my-3">
                        </div>
                    </div>

                    <div class="row" style="padding: 16px;">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="text-info ">Số sản phẩm: <?=$data['SoSanPham']?></h6>
                                    <h6 class="text-info ">Tổng số lượng: <?=$data['TongSoLuong']?></h6>
                                    <h6 class="text-info ">Tổng thanh toán: <?=$data['TongTien']?> VND</h6>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="custom-control custom-radio mb-3">
                                        <input onclick="thanhtoankhinhan()" name="radio-thanhtoan" class="custom-control-input" id="customRadio1" type="radio">
                                        <label class="custom-control-label" for="customRadio1">
                                            <span>Thanh toán khi nhận hàng</span>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input onclick="thanhtoanbangthe()" name="radio-thanhtoan" class="custom-control-input" id="customRadio2"  type="radio">
                                        <label class="custom-control-label" for="customRadio2">
                                            <span>Thanh toán bằng thẻ</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="phuongthucthanhtoan"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3"></div>

        </div>
    </div>
</div>

<!-- <script src="https://www.paypal.com/sdk/js?client-id=AV5-QdSzCb05GhZEDCoPZMmNeJNlu5pKf2Ah4URP6ggUFMx8WvAhNUmMizKPZ97GiA8Wz7DsykFtxB5Z" async> </script> -->
<script>
    function thanhtoankhinhan() {
        $.get("ajax.php?controller=choadonxuat&action=getthanhtoankhinhan", {},function(data){
            $("#phuongthucthanhtoan").html(data);
            var detail = document.getElementById('detail-sanpham').clientHeight;
            window.scrollTo(0, detail - 800);
        });
    }
    function thanhtoanbangthe() {
        $.get("ajax.php?controller=choadonxuat&action=getthanhtoanpaypal", {
            "tongtien" : '<?=$data['TongTien']?>'
        },function(data){
            $("#phuongthucthanhtoan").html(data);
        });
    }
</script>