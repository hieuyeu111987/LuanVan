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
                        <label class="form-control-label" for="input-username">Tên danh mục</label>
                        <input type="text" id="input-tendanhmuc" class="form-control" value="<?= $data[0]["TenDanhMucTongQuat"]?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button onclick="suadanhmuc(<?= $data[0]["IDDanhMucTongQuat"]?>)" class="btn btn-sm btn-info" type="button">Cập nhật</button>
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
        var tendanhmuctongquat = $('#input-tendanhmuc').val();
        $.post("ajax.php?controller=cdanhmuctongquat&action=doeditdanhmuctongquat", {
            "tendanhmuctongquat" : tendanhmuctongquat,
            "iddanhmuc" : IDDanhMuc
        },function(data){
            $("#divload").html(data);
        });
    }
    function thoat() {
      $("#chitietdanhmuc").html(null);
      $("#dashboards-2").text("");
    }
</script>