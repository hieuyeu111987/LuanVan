<div class="container-fluid">
  <div class="row">
  <div class="col-xl-2 order-xl-1"></div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">

        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Chi tiết sản phẩm</h3>
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
                <div class="col-lg-7">
                
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên sản phẩm</label>
                        <input type="text" name="input-tensanpham" id="input-tensanpham" class="form-control" value="<?=$data['sanpham'][0]['TenSanPham']?>">
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Danh mục</label>
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
                    
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Mô tả</label>
                        <textarea class="form-control" name="input-mota" id="input-mota" rows="6"><?=$data['sanpham'][0]['Mota']?></textarea>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-lg-5">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="text-left">
                        <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modal-default">Chọn hình</button>
                        
                        <div class="modal fade " id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                            <div class="modal-content">

                              <div class="card-header">
                                  <div class="row align-items-center">
                                      <div class="col-8">
                                          <h3 class="mb-0">Chọn hình</h3>
                                      </div>
                                  </div>
                              </div>

                              <div class="card-body scrollbar-inner">
                                  <div class="row">
                                  <?php   for($i = 0; $i < count($data['hinhanh']); $i++) { ?>
                                      <div class="col-lg-3" style="text-align: center;">
                                      <img onclick="ChangeImg(<?=$data['hinhanh'][$i]['IDHinhAnh']?>)" id="image-<?=$data['hinhanh'][$i]['IDHinhAnh']?>" class="btn btn-outline-info" style="width: 100%;" src="../public/image/sanpham/<?=$data['hinhanh'][$i]['HinhAnh']?>" alt="image">
                                      </div>
                                  <?php }?>
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
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <div id="hinh">
                            <img style="width: 100%;" src="../public/image/sanpham/<?=$data['sanpham'][0]['HinhAnh']?>" alt="hinhanh">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                    <div class="text-right">
                        <button onclick="suasanpham(<?=$data['sanpham'][0]['IDSanPham']?>)" class="btn btn-sm btn-info" type="button">Cập nhật thông tin sản phẩm</button>
                    </div>
                </div>
              </div>

              <hr class="my-4" />

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">

                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-12">
                          <h3 class="mb-0">Giá sản phẩm</h3>
                        </div>
                      </div>
                    </div>

                    <div class="card-body">
                      <form>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="table-responsive">
                              <table id="data-table2" class="table align-items-center table-flush">
                                  <thead class="thead-light">
                                      <tr>
                                          <th scope="col">STT</th>
                                          <th scope="col">Giá</th>
                                          <th scope="col">Đơn vị</th>
                                          <th scope="col">Ngày cập nhật</th>
                                          <th scope="col"></th>
                                      </tr>
                                  </thead>
                                      <tbody>
                                      <?php   for($i = 0; $i < count($data['giasanpham']); $i++) { ?>
                                          <tr>
                                              <td><?=$i + 1?></td>
                                              <td><?=$data['giasanpham'][$i]['Gia']?></td>
                                              <td><?=$data['giasanpham'][$i]['DonVi']?></td>
                                              <td><?=$data['giasanpham'][$i]['NgayCapNhat']?></td>
                                              <td style="text-align: center;">
                                                  <button onclick="xoagiasanpham(<?=$data['giasanpham'][$i]['IDGiaSanPham']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                              </td>
                                          </tr>
                                      <?php }?>
                                      </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Giá sản phẩm</label>
                              <input type="text" name="input-giasanpham" id="input-giasanpham" class="form-control" value="<?=$data['sanpham'][0]['Gia']?>">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Đơn vị</label>
                              <input type="text" name="input-donvi" id="input-donvi" class="form-control" value="<?=$data['sanpham'][0]['DonVi']?>">
                            </div>
                          </div>
                          <div class="col-lg-5">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Ngày cập nhật</label>
                              <input type="date" name="input-ngaycapnhat" id="input-ngaycapnhat" class="form-control" value="<?=$data['sanpham'][0]['NgayCapNhat']?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="text-right">
                                  <button onclick="themgiasanpham(<?=$data['sanpham'][0]['IDSanPham']?>)" class="btn btn-sm btn-info" type="button">Thêm giá sản phẩm</button>
                              </div>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4" />

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">

                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-12">
                          <h3 class="mb-0">Giảm giá sản phẩm</h3>
                        </div>
                      </div>
                    </div>

                    <div class="card-body">
                      <form>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="table-responsive">
                              <table id="data-table2" class="table align-items-center table-flush">
                                  <thead class="thead-light">
                                      <tr>
                                          <th scope="col">STT</th>
                                          <th scope="col">Giá</th>
                                          <th scope="col">Ngày bắt đầu</th>
                                          <th scope="col">Ngày kết thúc</th>
                                          <th scope="col"></th>
                                      </tr>
                                  </thead>
                                      <tbody>
                                      <?php   for($i = 0; $i < count($data['giamgiasanpham']); $i++) { ?>
                                          <tr>
                                              <td><?=$i + 1?></td>
                                              <td><?=$data['giamgiasanpham'][$i]['Gia']?></td>
                                              <td><?=$data['giamgiasanpham'][$i]['NgayBatDau']?></td>
                                              <td><?=$data['giamgiasanpham'][$i]['NgayKetThuc']?></td>
                                              <td style="text-align: center;">
                                                  <button onclick="xoagiamgiasanpham(<?=$data['giamgiasanpham'][$i]['IDGiamGiaSanPham']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                              </td>
                                          </tr>
                                      <?php }?>
                                      </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Giá</label>
                              <input type="text" name="input-giamgiasanpham" id="input-giamgiasanpham" class="form-control" value="<?=$data['sanpham'][0]['GiaGiam']?>">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Ngày bắt đầu</label>
                              <input type="date" name="input-ngaybatdau" id="input-ngaybatdau" class="form-control" value="<?=$data['sanpham'][0]['NgayBatDau']?>">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Ngày kết thúc</label>
                              <input type="date" name="input-ngayketthuc" id="input-ngayketthuc" class="form-control" value="<?=$data['sanpham'][0]['NgayKetThuc']?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="text-right">
                                  <button onclick="themgiamgiasanpham(<?=$data['sanpham'][0]['IDSanPham']?>)" class="btn btn-sm btn-info" type="button">Thêm giá sản phẩm</button>
                              </div>
                          </div>
                        </div>
                        
                      </form>
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
</div>
<script>
    $(document).ready( function () {
        $('#data-table2').DataTable();
    } );
    var idhinh = "<?php echo $data['sanpham'][0]['IDHinhAnh'] ?>";
    function ChangeImg(ID) {
        $("img").removeClass("active");
        $("#image-"+ID).addClass("active");
        idhinh = ID;
    }
    function suasanpham(IDSanPham) {
        var tensanpham = $('#input-tensanpham').val();
        var tendanhmucnhathuoc = $('#input-tendanhmucnhathuoc').val();
        var mota = $('#input-mota').val();
        console.log(idhinh);
        $.post("ajax.php?controller=csanpham&action=doeditsanpham", {
            "tensanpham" : tensanpham,
            "tendanhmucnhathuoc" : tendanhmucnhathuoc,
            "mota" : mota,
            "idhinh" : idhinh,
            "idsanpham" : IDSanPham
        },function(data){
            $("#divload").html(data);
        });
    }
    function chonhinh() {
        var img = $('#image-'+idhinh).attr("src");
        $("#hinh").html('<img style="width: 100%; height: 100%;" src="' + img + '" alt="hinhanh">');
      
        var table = document.getElementById('table').clientHeight;
        var navbar = document.getElementById('navbar').clientHeight;
        var header = document.getElementById('header').clientHeight;
        var chitiet = document.getElementById('chitiet').clientHeight;
        window.scrollTo(0, table + navbar + header + chitiet);
    }
    function themgiasanpham(IDSanPham) {
        var giasanpham = $('#input-giasanpham').val();
        var donvi = $('#input-donvi').val();
        var ngaycapnhat = $('#input-ngaycapnhat').val();
        $.post("ajax.php?controller=csanpham&action=doaddgiasanpham", {
            "giasanpham" : giasanpham,
            "donvi" : donvi,
            "ngaycapnhat" : ngaycapnhat,
            "idsanpham" : IDSanPham
        },function(data){
            $("#chitiet").html(data);
        });
    }
    function xoagiasanpham(IDGiaSanPham) {
        var idsanpham = "<?php echo $data['sanpham'][0]['IDSanPham']?>";
        $.get("ajax.php?controller=csanpham&action=dodeletegiasanpham", {
            "idsanpham" : idsanpham,
            "idgiasanpham" : IDGiaSanPham
        },function(data){
            $("#chitiet").html(data);
        });
    }
    function themgiamgiasanpham(IDSanPham) {
        var giamgiasanpham = $('#input-giamgiasanpham').val();
        var ngaybatdau = $('#input-ngaybatdau').val();
        var ngayketthuc = $('#input-ngayketthuc').val();
        $.post("ajax.php?controller=csanpham&action=doaddgiamgiasanpham", {
            "giasanpham" : giamgiasanpham,
            "ngaybatdau" : ngaybatdau,
            "ngayketthuc" : ngayketthuc,
            "idsanpham" : IDSanPham
        },function(data){
            $("#chitiet").html(data);
        });
    }
    function xoagiamgiasanpham(IDGiamGiaSanPham) {
        var idsanpham = "<?php echo $data['sanpham'][0]['IDSanPham']?>";
        $.get("ajax.php?controller=csanpham&action=dodeletegiamgiasanpham", {
            "idsanpham" : idsanpham,
            "idgiamgiasanpham" : IDGiamGiaSanPham
        },function(data){
            $("#chitiet").html(data);
        });
    }
    function thoat() {
      $("#chitiet").html(null);
    }
</script>