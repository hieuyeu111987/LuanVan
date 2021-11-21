<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Chi tiết tin tức</h3>
                </div>
                <div class="col-4 text-right">
                  <button onclick="thoat()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="ajax.php?controller=ctintuc&action=doedittintuc&idtintuc=<?= $data[0]["IDTinTuc"]?>" method="POST" enctype="multipart/form-data">
                <div class="pl-lg-4">
                    
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tiêu đề</label>
                        <input type="text" id="input-tentintuc" name="input-tentintuc" class="form-control" value="<?= $data[0]["TenTinTuc"]?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <input type="file" id="input-anhdaidien" name="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                        <div id="hinh"><img style="width: 50%; height: 300px;" src="../public/image/tintuc/<?=$data[0]['AnhDaiDien']?>" alt="congtyduoc"></div>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button type="submit" onclick="suatintuc(<?= $data[0]["IDTinTuc"]?>)" class="btn btn-sm btn-info" type="button">Cập nhật</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    // function suatintuc(IDTinTuc) {
    //     var tentintuc = $('#input-tentintuc').val();
    //     var anhdaidien = $('#input-anhdaidien').val();
    //     // var anhdaidien = $('#input-anhdaidien').prop('files')[0]["name"];
    //     $.post("ajax.php?controller=ctintuc&action=doedittintuc", {
    //         "IDTinTuc" : IDTinTuc,
    //         "tentintuc" : tentintuc,
    //         "anhdaidien"      : anhdaidien
    //     },function(data){
    //         $("#divload").html(data);
    //     });
    // }
    function UpImg() {
      $("#hinh").html('<img style="width: 50%; height: 300px;" src="' + URL.createObjectURL(event.target.files[0]) + '" alt="congtyduoc">');
    }
    function thoat() {
      $("#chitietcongtyduoc").html(null);
      $("#dashboards-2").text("");
    }
</script>