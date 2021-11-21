<div class="container-fluid">
      <div class="row mt--6">
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
                <button onclick="editgiaodien(<?= $data[0]['IDNhaThuoc']?>)" class="btn btn-sm btn-info mr-0">Sửa giao diện</button>
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
            <div id="bangthongtin" class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Chi tiết nhà thuốc</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="ajax.php?controller=cnhathuoc&action=doeditnhathuoc" method="POST" enctype="multipart/form-data">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên nhà thuốc</label>
                        <input type="text" id="input-tennhathuoc" name="input-tennhathuoc" class="form-control" value="<?= $data[0]["TenNhaThuoc"]?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" name="input-email" class="form-control" value="<?= $data[0]["Email"]?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Số điện thoại</label>
                        <input type="text" id="input-sdt" name="input-sdt" class="form-control" value="<?= $data[0]["SDT"]?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Website</label>
                        <input type="text" id="input-website" name="input-website" class="form-control" value="<?= $data[0]["WebSite"]?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Ngày đăng ký</label>
                        <input type="date" id="input-ngaydangky" name="input-ngaydangky" class="form-control" value="<?= $data[0]["NgayDangKy"]?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mã giao dịch Paypal</label>
                        <input type="text" id="input-mapaypal" name="input-mapaypal" class="form-control" value="<?= $data[0]["IDPayPal"] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Địa chỉ nhà thuốc</label>
                        <input type="text" id="input-diachi" name="input-diachi" class="form-control" value="<?= $data[0]["DiaChi"]?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <input type="file" name="input-anhdaidien" id="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                        <div id="anhdaidien">
                          <img style="max-width: 100%;" src="../public/image/nhathuoc/<?= $data[0]["AnhDaiDien"]?>" alt="giayphep">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Giấy phép</label>
                        <input type="file" name="input-anhgiayphep" id="input-anhgiayphep" class="form-control" onchange="UpImgGiayPhep()" multiple="true">
                        <button type="button" class=" btn-block btn-white mb-3" data-toggle="modal" data-target="#modal-default"><img id="giayphep" class="form-control" style="height: 280px" src="../public/image/giayphep/<?= $data[0]["GiayPhep"]?>" alt="giayphep"></button>
                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              
                              <img id="giayphepphongto" src="../public/image/giayphep/<?= $data[0]["GiayPhep"]?>" alt="giayphep">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="my-3">

                  <div class="row ">
                      <div class="col-12 text-right">
                          <button class="btn btn-sm btn-info" type="submit">Sửa thông tin</button>
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
        x = latdiachinhathuoc;
        y = lngdiachinhathuoc;
        var marker = L.marker([latdiachinhathuoc,lngdiachinhathuoc]).addTo(mymap);
        marker.bindPopup('Nhà thuốc của bạn đặt tại vị trí này').openPopup();
        
        var popup = L.popup();
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                // .setContent("Địa điểm bạn chọn: " + e.latlng.toString())
                .setContent("<button onclick='thaydoivitri()' class='btn btn-sm btn-info'>Đổi sang vị trí này</button>")
                .openOn(mymap);
                x = e.latlng.lat;
                y = e.latlng.lng;
                // console.log(x + " - " + y);
        }
        mymap.on('click', onMapClick);
    } );

    function UpImg() {
        $("#anhdaidien").html('<img style="width: 50%; height: 300px;" src="' + URL.createObjectURL(event.target.files[0]) + '" alt="hinhanh">');
      
        var navbar = document.getElementById('navbar').clientHeight;
        var header = document.getElementById('header').clientHeight;
        var bangthongtin = document.getElementById('bangthongtin').clientHeight;
        window.scrollTo(0, bangthongtin + navbar + header + 100);
    }

    function UpImgGiayPhep() {
        $("#giayphep").attr("src",URL.createObjectURL(event.target.files[0]));
        $("#giayphepphongto").attr("src",URL.createObjectURL(event.target.files[0]));
        
        var navbar = document.getElementById('navbar').clientHeight;
        var header = document.getElementById('header').clientHeight;
        var bangthongtin = document.getElementById('bangthongtin').clientHeight;
        window.scrollTo(0, bangthongtin + navbar + header + 500);
    }

    function editgiaodien(IDNhaThuoc) {
        $.get("ajax.php?controller=cnhathuoc&action=geteditgiaodien", {
            "idnhathuoc" : IDNhaThuoc
        },function(data){
            $("#divload").html(data);
        });
    }

    function thaydoivitri() {
        $.get("ajax.php?controller=cnhathuoc&action=dothaydoivitri", {
            "x" : x,
            "y" : y
        },function(data){
            $("#divload").html(data);
        });
    }

    function thoat() {
      $("#chitietnhathuoc").html(null);
      $("#dashboards-2").text("");
    }
</script>