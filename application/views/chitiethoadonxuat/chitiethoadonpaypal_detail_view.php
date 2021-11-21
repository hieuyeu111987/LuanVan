<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Chi tiết đơn hàng</h3>
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
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên người mua</label>
                        <input type="text" id="input-tennguoimua" class="form-control" value="<?= $data['hoadonpaypal'][0]["PayerName"]?>" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Email</label>
                            <input type="text" id="input-email" class="form-control" value="<?= $data['hoadonpaypal'][0]["PayerEmail"]?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Ngày đặt hàng</label>
                            <input type="text" id="input-ngaydathang" class="form-control" value="<?= $data['hoadonpaypal'][0]["CreateTime"]?>" disabled>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Địa chỉ</label>
                        <input type="text" id="input-diachi" class="form-control" value="<?= $data['hoadonpaypal'][0]["AddressLine1"].', '.$data['hoadonpaypal'][0]["AddressLine2"].', '.$data['hoadonpaypal'][0]["AdminArea2"].', '.$data['hoadonpaypal'][0]["AdminArea1"]?>" disabled>
                      </div>
                    </div>
                  </div>

                </div>

                <hr class="my-4" />
                <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label class="form-control-label" for="input-username">Danh sách sản phẩm</label>
                      </div>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Tên sản phẩm</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group" style="text-align: center;">
                            <label class="form-control-label" for="input-username">Số lượng</label>
                        </div>
                    </div>
                  </div>

                  <?php for ($i=0; $i < count($data['chitiethoadonxuat']) ; $i++) { ?>

                  <div class="row">
                    <div class="col-lg-10">
                        <p class="text-muted mb-0"><?= $data['chitiethoadonxuat'][$i]['TenSanPham'] ?></p>
                    </div>
                    <div class="col-lg-2" style="text-align: center;">
                        <p class="text-muted mb-0"><?= $data['chitiethoadonxuat'][$i]['SoLuong'] ?></p>
                    </div>
                  </div>

                  <?php } ?>

                </div>

                <hr class="my-4" />
                
                <?php if($data['tab'] == 'donhang'){ ?>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button onclick="giaohang('<?= $data['hoadonpaypal'][0]['IDHoaDonPayPal']?>')" class="btn btn-sm btn-info" type="button">Giao hàng</button>
                        </div>
                    </div>
                </div>
                
                <?php } else{}?>
                
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    function giaohang(IDHoaDonPayPal) {
        $.get("ajax.php?controller=choadonxuat&action=giaohanghoadonpaypal", {
            "idhoadonpaypal" : IDHoaDonPayPal
        },function(data){
            $("#divload").html(data);
        });
    }
    function thoat() {
      $("#chitietdonhang").html(null);
    }
</script>