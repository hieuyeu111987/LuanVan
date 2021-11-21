<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Chi tiết danh mục</h3>
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
                        <label class="form-control-label" for="input-username">Tên danh mục nhà thuốc</label>
                        <input type="text" id="input-tendanhmucnhathuoc" class="form-control" value="<?= $data['DanhMucNhaThuoc'][0]["TenDanhMucNhaThuoc"]?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên danh mục tổng quát</label>
                        <select id="input-tendanhmuctongquat" class="form-control">
                        <option value="NULL"></option>
                        <?php   for($i = 0; $i < count($data['DanhMucTongQuat']); $i++) { ?>
                          <option value="<?=$data['DanhMucTongQuat'][$i]['IDDanhMucTongQuat']?>"><?=$data['DanhMucTongQuat'][$i]['TenDanhMucTongQuat']?></option>
                        <?php }?>
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button onclick="suadanhmuc(<?= $data['DanhMucNhaThuoc'][0]['IDDanhMucNhaThuoc']?>)" class="btn btn-sm btn-info" type="button">Cập nhật</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    function suadanhmuc(IDDanhMuc) {
        var tendanhmucnhathuoc = $('#input-tendanhmucnhathuoc').val();
        var tendanhmuctongquat = $('#input-tendanhmuctongquat').val();
        $.post("ajax.php?controller=cdanhmucnhathuoc&action=doeditdanhmucnhathuoc", {
            "tendanhmucnhathuoc" : tendanhmucnhathuoc,
            "iddanhmuctongquat" : tendanhmuctongquat,
            "iddanhmuc" : IDDanhMuc
        },function(data){
            $("#divload").html(data);
        });
    }
    function thoat() {
      $("#chitietdanhmuc").html(null);
    }
</script>