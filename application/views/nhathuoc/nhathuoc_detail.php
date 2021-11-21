<div class="container-fluid">
      <div class="row">
        <div class="col-xl-4 order-xl-2">

          <div class="card card-profile">

            <img src="../public/image/nhathuoc/BR_2.jpg" alt="Image placeholder" class="card-img-top bg-success">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../public/image/nhathuoc/<?= $data[0]["AnhDaiDien"]?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <!-- <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div> -->
            </div>
            
            <div class="card-body pt-0">

              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div class="col-lg-4 mr-0">
                      <span class="heading"><?= $data[0]['TongLuotThich'] ?></span>
                      <span class="description">Lượt thích</span>
                    </div>
                    <div class="col-lg-4 mr-0">
                      <span class="heading"><?= $data[0]['SoLuongNhapCuaNhaThuoc'] ?></span>
                      <span class="description">Sản phẩm</span>
                    </div>
                    <div class="col-lg-4 mr-0">
                      <span class="heading"><?= $data[0]['SoLuongXuatCuaNhaThuoc'] ?></span>
                      <span class="description">Đã bán</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <h5 class="h3"><?= $data[0]['TenNhaThuoc'] ?></h5>
                <div class="h5 font-weight-300"><?= $data[0]['WebSite'] ?></div>
                <div class="h5 mt-4"><?= $data[0]['DiaChi'] ?></div>
                <div><?= $data[0]['NgayDangKy'] ?></div>
              </div>

            </div>
          </div>
          
          <div class="card card-profile">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <h3 class="mb-0">Vị trí nhà thuốc</h3>
              </div>
            </div>
            <div id="mapid" class="card-body pt-0" style="width: 100%; height: 240px"></div>
          </div>

        </div>

        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Chi tiết nhà thuốc</h3>
                </div>
                <div class="col-4 text-right">
                  <button onclick="thoat()" class="btn btn-sm btn-primary" type="button"><i class="fas fa-times-circle"></i></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên nhà thuốc</label>
                        <input type="text" id="input-username" class="form-control" value="<?= $data[0]["TenNhaThuoc"]?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" class="form-control" value="<?= $data[0]["Email"]?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Số điện thoại</label>
                        <input type="text" id="input-first-name" class="form-control" value="<?= $data[0]["SDT"]?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Website</label>
                        <input type="text" id="input-last-name" class="form-control" value="<?= $data[0]["WebSite"]?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Ngày đăng ký</label>
                        <input type="date" id="input-first-name" class="form-control" value="<?= $data[0]["NgayDangKy"]?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Trạng thái</label>
                        <input type="text" id="input-first-name" class="form-control" value="<?= $data[0]["TrangThai"] == 0 ? 'Khóa' : 'Hoạt động'?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Địa chỉ nhà thuốc</label>
                        <input type="text" id="input-first-name" class="form-control" value="<?= $data[0]["DiaChi"]?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Giấy phép</label>
                        <button type="button" class=" btn-block btn-white mb-3" data-toggle="modal" data-target="#modal-default"><img class="form-control" style="height: 280px" src="../public/image/giayphep/<?= $data[0]["GiayPhep"]?>" alt="giayphep"></button>
                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              <!-- <div class="modal-header">
                                <h6 class="modal-title" id="modal-title-default">Giấy phép</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div> -->
                              <img src="../public/image/giayphep/<?= $data[0]["GiayPhep"]?>" alt="giayphep">
                              <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-primary ml-auto" data-dismiss="modal">Thoát</button>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
<script>
    var x;
    var y;
    var diachinhathuoc = <?php echo json_encode($data[0]["ToaDo"]); ?>;
    $(document).ready( function () {
        var mymap = L.map('mapid').setView([10.04688204348061, 105.76780486797722], 16);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGlldXlldTExMTk4NyIsImEiOiJja2oxNmlzcTIyejJkMnNuNGpiOXdhbWwyIn0.1GEBleIFpvbryFuDwMvZlw'
        }).addTo(mymap);

        latdiachinhathuoc = diachinhathuoc.substr(0,diachinhathuoc.search(",")-1);
        lngdiachinhathuoc = diachinhathuoc.substr(diachinhathuoc.search(",")+1);
        var marker = L.marker([latdiachinhathuoc,lngdiachinhathuoc]).addTo(mymap);
        marker.bindPopup('Nhà thuốc đặt tại vị trí này').openPopup();
    } );
    function thoat() {
      $("#chitietnhathuoc").html(null);
      $("#dashboards-2").text("");
    }
</script>