<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Thêm danh mục</h3>
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
                        <input type="text" id="input-tendanhmucnhathuoc" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên danh mục tổng quát</label>
                        <select id="input-tendanhmuctongquat" class="form-control">
                        <option value="NULL"></option>
                        <?php   for($i = 0; $i < count($data); $i++) { ?>
                          <option value="<?=$data[$i]['IDDanhMucTongQuat']?>"><?=$data[$i]['TenDanhMucTongQuat']?></option>
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
                            <button onclick="themdanhmuc()" class="btn btn-sm btn-info" type="button">Thêm</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    function themdanhmuc() {
        var tendanhmucnhathuoc = $('#input-tendanhmucnhathuoc').val();
        var iddanhmuctongquat = $('#input-tendanhmuctongquat').val();
        $.post("ajax.php?controller=cdanhmucnhathuoc&action=doadddanhmucnhathuoc", {
            "tendanhmucnhathuoc" : tendanhmucnhathuoc,
            "iddanhmuctongquat" : iddanhmuctongquat
        },function(data){
            $("#divload").html(data);
        });
    }
    function thoat() {
      $("#chitietdanhmuc").html(null);
      $("#dashboards-2").text("");
    }
</script>