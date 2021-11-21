<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Công ty dược</h3>
                    </div>
                    <div class="col-4 text-right">
                        <button onclick="viewthemcongtyduoc()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="data-table" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Tên công ty</th>
                            <th scope="col">Website</th>
                            <th scope="col"  style="text-align: center;">Hiển thị</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php   for($i = 0; $i < count($data); $i++) { ?>
                            <tr>
                                <td><?=$i + 1?></td>
                                <td><img style="width: 50px; height: 50px;" src="../public/image/congtyduoc/<?=$data[$i]['AnhDaiDien']?>" alt="congtyduoc"></td>
                                <td><?=$data[$i]['TenCongTyDuoc']?></td>
                                <td><?=$data[$i]['WebSite']?></td>
                                <td style="text-align: center;">
                                    <button onclick="doitrangthaicongtyduoc(<?= $data[$i]['IDCongTyDuoc']?>)" class="btn btn-sm btn-<?= $data[$i]["HienThi"] == 1 ? 'success' : 'danger' ?>" type="button"><?= $data[$i]["HienThi"] == 1 ? '<i class="fas fa-unlock"></i>' : '<i class="fas fa-lock"></i>' ?></button>
                                </td>
                                <td style="text-align: center;">
                                    <button onclick="chitietcongtyduoc(<?=$data[$i]['IDCongTyDuoc']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                    <button onclick="xoacongtyduoc(<?=$data[$i]['IDCongTyDuoc']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="chitietcongtyduoc"></div>
<link rel="stylesheet" type="text/css" href="../tables/datatables.min.css">
<script type="text/javascript" src="../tables/jquery.min.js"></script>
<script type="text/javascript" src="../tables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function doitrangthaicongtyduoc(IDCongTyDuoc) {
        $.get("ajax.php?controller=ccongtyduoc&action=doitrangthaicongtyduoc", {
            "idcongtyduoc" : IDCongTyDuoc
        },function(data){
            $("#divload").html(data);
        });
    }
    function chitietcongtyduoc(IDCongTyDuoc) {
        $.get("ajax.php?controller=ccongtyduoc&action=getchitietcongtyduoc", {
            "idcongtyduoc" : IDCongTyDuoc
        },function(data){
            $("#chitietcongtyduoc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Sửa công ty dược");
    }
    function viewthemcongtyduoc() {
        $.get("ajax.php?controller=ccongtyduoc&action=addcongtyduoc", {},function(data){
            $("#chitietcongtyduoc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Thêm công ty dược");
    }
    function xoacongtyduoc(IDCongTyDuoc) {
        $.get("ajax.php?controller=ccongtyduoc&action=dodeletecongtyduoc", {
            "idcongtyduoc" : IDCongTyDuoc
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>