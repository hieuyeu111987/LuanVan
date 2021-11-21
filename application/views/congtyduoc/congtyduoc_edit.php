<div class="container-fluid">
      <div class="row">
        <div class="col-xl-2 order-xl-1"></div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Chi tiết công ty dược</h3>
                </div>
                <div class="col-4 text-right">
                  <button onclick="thoat()" class="btn btn-sm btn-info" type="button"><i class="fas fa-times-circle"></i></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="ajax.php?controller=ccongtyduoc&action=doeditcongtyduoc&idcongtyduoc=<?= $data[0]["IDCongTyDuoc"]?>" method="POST" enctype="multipart/form-data">
                <div class="pl-lg-4">
                    
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tên công ty dược</label>
                        <input type="text" id="input-tencongtyduoc" name="input-tencongtyduoc" class="form-control" value="<?= $data[0]["TenCongTyDuoc"]?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Đường dẫn website</label>
                        <input type="text" id="input-duongdan" name="input-duongdan" class="form-control" value="<?= $data[0]["WebSite"]?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Ảnh đại diện</label>
                        <input type="file" id="input-anhdaidien" name="input-anhdaidien" class="form-control" onchange="UpImg()" multiple="true">
                        <div id="hinh"><img style="width: 50%; height: 300px;" src="../public/image/congtyduoc/<?=$data[0]['AnhDaiDien']?>" alt="congtyduoc"></div>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<script>
    // function suacongtyduoc(IDCongTyDuoc) {
    //     var tencongtyduoc = $('#input-tencongtyduoc').val();
    //     var duongdan = $('#input-duongdan').val();
    //     // var anhdaidien = $('#input-anhdaidien').prop('files')[0]["name"];
    //     $.post("ajax.php?controller=ccongtyduoc&action=doeditcongtyduoc", {
    //         "IDCongTyDuoc" : IDCongTyDuoc,
    //         "tencongtyduoc" : tencongtyduoc,
    //         "duongdan"      : duongdan
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