
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
</head>

<body class="register-page">
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
                <form action="ajax.php?controller=cdangky&action=kiemtramaxacnhan" method="POST" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Tên người dùng</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input id="tennguoidung" name="tennguoidung" class="form-control" placeholder="Tên người dùng" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Số điện thoại</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-tablet-button"></i></span>
                                </div>
                                <input id="sdt" name="sdt" class="form-control" placeholder="Số điện thoại" type="number">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Chứng minh nhân dân</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                </div>
                                <input id="cmnd" name="cmnd" class="form-control" placeholder="Chứng minh nhân dân" type="text">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Email</label>
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="email" name="email" class="form-control" placeholder="Email" type="email">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <div id="hinh" style="height: 180px;"></div>
                        <input id="anhdaidien" name="anhdaidien" type="file" id="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tài khoản</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input id="taikhoan" name="taikhoan" class="form-control" placeholder="Tài khoản" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Mật khẩu</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input id="matkhau" name="matkhau" class="form-control" placeholder="Mật khẩu" type="password">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group focused">
                              <label class="form-control-label" for="input-username">Mã xác thực</label>
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                                  </div>
                                  <input id="maxacthuc" name="maxacthuc" class="form-control" placeholder="Mã xác thực" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group focused">
                              <label class="form-control-label" for="input-username"></label>
                              <div class="input-group input-group-alternative mt-2">
                                  <button class="form-control btn btn-primary" type="button" onclick="guimaxacnhan()">Gửi</button>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Tạo tài khoản</button>
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
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>
  <script>
    function guimaxacnhan(){
        var sdt      = $('#sdt').val();
        if(sdt){
          console.log(sdt);
          $.post('ajax.php?controller=cdangky&action=guimaxacnhan', {
              sdt             : sdt
          }, function (data) {
              $("#load").html(data);
              // if(ketqua === "true"){}else{}
          });
        }else{
          alert("Chưa nhập số điện thoại!");
        }
        
    }
    function taotaikhoan(){
        var maxacthuc      = $('#maxacthuc').val();
        $.post('ajax.php?controller=cdangky&action=kiemtramaxacnhan', {
            maxacthuc         : maxacthuc
        }, function (data) {
            $("#load").html(data);
        });
    }
  </script>
  <div id="load"></div>
</body>

</html>
<script>
  function UpImg() {
    $("#hinh").html('<img style="width: 100%; height: 100%;" src="' + URL.createObjectURL(event.target.files[0]) + '" alt="congtyduoc">');
  }
</script>