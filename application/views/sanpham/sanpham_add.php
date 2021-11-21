<div class="container-fluid">
  <div class="row">
    <div class="col-xl-3 order-xl-1"></div>
    <div class="col-xl-6 order-xl-1">
      <div class="card">

        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Thêm sản phẩm</h3>
            </div>
            <div class="col-4 text-right">
              <button onclick="thoat()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
            </div>
          </div>
        </div>

        <div class="card-body">
          <form action="ajax.php?controller=csanpham&action=doaddsanpham" method="POST" enctype="multipart/form-data">
            <div class="pl-lg-4">

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tên sản phẩm</label>
                    <input type="text" name="input-tensanpham" id="input-tensanpham" class="form-control">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Tên danh mục nhà thuốc</label>
                    <select id="input-tendanhmucnhathuoc" class="form-control">
                    <option value="NULL"></option>
                    <?php   for($i = 0; $i < count($data['danhmucnhathuoc']); $i++) { ?>
                      <option value="<?=$data['danhmucnhathuoc'][$i]['IDDanhMucNhaThuoc']?>"><?=$data['danhmucnhathuoc'][$i]['TenDanhMucNhaThuoc']?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Giá sản phẩm</label>
                    <input type="text" name="input-giasanpham" id="input-giasanpham" class="form-control">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Đơn vị</label>
                    <input type="text" name="input-donvi" id="input-donvi" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Mô tả</label>
                    <textarea class="form-control" name="input-mota" id="input-mota"  rows="5"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                    <div class="text-left">
                        <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modal-default">Chọn hình</button>
                        
                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">Chọn hình</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="height: 400px; overflow-y: scroll;">
                                    <div class="card-body">
                                        <div class="row">
                                        <?php   for($i = 0; $i < count($data['hinhanh']); $i++) { ?>
                                            <div class="col-lg-4" style="text-align: center; margin-top: 20px;">
                                            <img onclick="ChangeImg(<?=$data['hinhanh'][$i]['IDHinhAnh']?>)" id="image-<?=$data['hinhanh'][$i]['IDHinhAnh']?>" class="btn btn-outline-info" style="width: 100%;" src="../public/image/sanpham/<?=$data['hinhanh'][$i]['HinhAnh']?>" alt="image">
                                            </div>
                                        <?php }?>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="row ">
                                            <div class="col-6">
                                                <button class="btn btn-sm btn-info" type="button" onclick="themhinh()" data-toggle="modal" data-target="#modal-default">Thêm hình</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button class="btn btn-sm btn-info" type="button" onclick="chonhinh()" data-toggle="modal" data-target="#modal-default">Chọn</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                            
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div id="hinh"></div>
                  </div>
                </div>
              </div>
              
            </div>

            <hr class="my-4" />

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right">
                        <button onclick="themsanpham()" class="btn btn-sm btn-info" type="button">Thêm</button>
                    </div>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    var idhinh;
    function ChangeImg(ID) {
        $("img").removeClass("active");
        $("#image-"+ID).addClass("active");
        idhinh = ID;
    }
    function chonhinh() {
        var img = $('#image-'+idhinh).attr("src");
        $("#hinh").html('<img style="width: 50%; height: 300px;" src="' + img + '" alt="hinhanh">');
      
        var table = document.getElementById('table').clientHeight;
        var navbar = document.getElementById('navbar').clientHeight;
        var header = document.getElementById('header').clientHeight;
        var chitiet = document.getElementById('chitiet').clientHeight;
        window.scrollTo(0, table + navbar + header + chitiet);
    }
    function themsanpham() {
      var tensanpham = $('#input-tensanpham').val();
      var tendanhmucnhathuoc = $('#input-tendanhmucnhathuoc').val();
      var mota = $('#input-mota').val();
      var giasanpham = $('#input-giasanpham').val();
      var donvi = $('#input-donvi').val();
        $.post("ajax.php?controller=csanpham&action=doaddsanpham", {
          "tensanpham" : tensanpham,
          "tendanhmucnhathuoc" : tendanhmucnhathuoc,
          "mota" : mota,
          "idhinh" : idhinh,
          "giasanpham" : giasanpham,
          "donvi" : donvi
        },function(data){
            $("#divload").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
    }
    function thoat() {
      $("#chitiet").html(null);
    }
</script>