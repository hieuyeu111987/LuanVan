<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Thêm tin tức</h3>
                </div>
                <div class="col-4 text-right">
                  <button onclick="thoat()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="ajax.php?controller=ctintuc&action=doaddtintuc" method="POST" enctype="multipart/form-data">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tiêu đề</label>
                        <input type="text" name="input-tentintuc" id="input-tentintuc" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <input type="file" name="input-anhdaidien" id="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                        <div id="hinh"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="submit">Thêm</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    function UpImg() {
      $("#hinh").html('<img style="width: 50%; height: 300px;" src="' + URL.createObjectURL(event.target.files[0]) + '" alt="tintuc">');
    }
    function thoat() {
      $("#chitiettintuc").html(null);
      $("#dashboards-2").text("");
    }
</script>