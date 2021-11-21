<div id="table" class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tin tức</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button onclick="viewthemtintuc()" class="btn btn-sm btn-info" type="button"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="data-table" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col" style="text-align: center;">Trạng thái</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php   for($i = 0; $i < count($data); $i++) { ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><img style="width: 50px; height: 50px;" src="../public/image/tintuc/<?=$data[$i]['AnhDaiDien']?>" alt="image"></td>
                                    <td><?=$data[$i]['TenTinTuc']?></td>
                                    <td style="text-align: center;">
                                        <button onclick="doitrangthaitintuc(<?= $data[$i]["IDTinTuc"]?>)" class="btn btn-sm btn-<?= $data[$i]["TrangThai"] == 1 ? 'success' : 'danger' ?>" type="button"><?= $data[$i]["TrangThai"] == 1 ? '<i class="fas fa-unlock"></i>' : '<i class="fas fa-lock"></i>' ?></button>
                                    </td>
                                    <td style="text-align: center;">
                                        <button onclick="chitiettintuc(<?=$data[$i]['IDTinTuc']?>)" class="btn btn-sm btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                        <button onclick="xoatintuc(<?=$data[$i]['IDTinTuc']?>)" class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
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

<div id="chitiettintuc"></div>

<link rel="stylesheet" type="text/css" href="../tables/datatables.min.css">
<script type="text/javascript" src="../tables/jquery.min.js"></script>
<script type="text/javascript" src="../tables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#data-table').DataTable();
    } );
</script>
<script>
    function chitiettintuc(IDTinTuc) {
        $.get("ajax.php?controller=ctintuc&action=edittintuc", {
            "idtintuc" : IDTinTuc
        },function(data){
            $("#chitiettintuc").html(data);
            var table = document.getElementById('table').clientHeight;
            var navbar = document.getElementById('navbar').clientHeight;
            var header = document.getElementById('header').clientHeight;
            window.scrollTo(0, table + navbar + header - 90);
        });
        $("#dashboards-2").text("Sửa tin tức");
    }
    function viewthemtintuc() {
        $.get("ajax.php?controller=ctintuc&action=addtintuc", {},function(data){
            $("#chitiettintuc").html(data);
            window.scrollTo(0,document.body.scrollHeight);
        });
        $("#dashboards-2").text("Thêm tin tức");
    }
    function xoatintuc(IDTinTuc) {
        $.get("ajax.php?controller=ctintuc&action=dodeletetintuc", {
            "idtintuc" : IDTinTuc
        },function(data){
            $("#divload").html(data);
        });
    }
    function doitrangthaitintuc(IDTinTuc) {
        console.log(IDTinTuc);
        $.get("ajax.php?controller=ctintuc&action=doitrangthaitintuc", {
            "idtintuc" : IDTinTuc
        },function(data){
            $("#divload").html(data);
        });
    }
  </script>