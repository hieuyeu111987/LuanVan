
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Đăng ký tài khoản Medicin</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
  <!-- Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    
    <!--  -->
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="../tables/datatables.min.css">

</head>

<body style="min-height: 800px;">
  <div class="wrapper">
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container mt--5">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-3" style="height: 60px;">
                <div class="text-center">
                  <div class="navbar-horizontal navbar-transparent">
                    <div class="container">
                      <a class="navbar-brand mt-1" href="home.php">
                        <img style="height: 50px;" src="../public/image/logo/bishop-logo.png">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body ">
                <form action='ajax.php?controller=cnhathuoc&action=doaddnhathuoc' method="POST" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Tên nhà thuốc</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input id="input-tennhathuoc" name="input-tennhathuoc" class="form-control" placeholder="Tên nhà thuốc" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Số điện thoại</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                                </div>
                                <input id="input-sdt" name="input-sdt" class="form-control" placeholder="Số điện thoại" type="number">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Email</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                </div>
                                <input id="input-email" name="input-email" class="form-control" placeholder="Email" type="email">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Địa chỉ</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="input-diachi" name="input-diachi" class="form-control" placeholder="Địa chỉ" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <div id="anhdaidien" style="height: 180px;"></div>
                        <input id="input-anhdaidien" name="input-anhdaidien" onchange="UpImg()" type="file" class="form-control">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Website</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input id="input-website" name="input-website" class="form-control" placeholder="Địa chỉ website" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Mã giao dịch paypal</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input id="input-mapaypal" name="input-mapaypal" class="form-control" placeholder="Mã giao dịch paypal" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Giấy xác nhận đủ điều kiện bán thuốc</label>
                        <input type="file" name="input-anhgiayphep" id="input-anhgiayphep" class="form-control">
                        
                      </div>
                    </div>

                    </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Vị trí nhà thuốc</label>
                            <input id="text-vitri" name="input-vitri" type="hidden" class="form-control">
                            <div id="mapid" class="card-body pt-0" style="width: 100%; height: 240px"></div>
                        </div>
                    </div>
                    
                </div>
                
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Đăng ký</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <script src="../assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <!--  -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  
  <script type="text/javascript" src="../tables/datatables.min.js"></script>
  

  <div id="load"></div>
</body>

</html>
<script>
    var x;
    var y;
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
        var popup = L.popup();
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Vị trí bạn chọn")
                .openOn(mymap);
                x = e.latlng.lat;
                y = e.latlng.lng;
                $('#text-vitri').val(x + ', ' + y);
        }
        mymap.on('click', onMapClick);
    } );

    function UpImg() {
        $("#anhdaidien").html('<img style="width: 100%; height: 100%;" src="' + URL.createObjectURL(event.target.files[0]) + '" alt="hinhanh">');
    }
</script>